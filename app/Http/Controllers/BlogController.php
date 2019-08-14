<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Request\CieloRequestException;

class BlogController extends Controller
{

    public function home() {
        $posts = Post::paginate(1);
        return vieW('blog.home', compact('posts'));
    }

    private $MERCHANT = false;
    private $ENVIRONMENT = false;
    public function __construct() {
        $merchant_id = '74554d95-24cc-462f-9b56-001f37ec538f';
        $merchant_key = '6xp1aNfkGypX4anOph3cczDYrDfENGeldjzzBsay';
        if($merchant_id == false) throw new \Exception("Merchant id not defined", 1);
        if($merchant_key == false) throw new \Exception("Merchant key not defined", 1);
        $this->MERCHANT = new Merchant($merchant_id, $merchant_key);
        if(env('CIELO_SANDBOX', false) == true) {
            $this->ENVIRONMENT = Environment::sandbox();
        }
        else {
            $this->ENVIRONMENT = Environment::production();
        }
    }

    public function payment() {
        $cc = '5274961326848794';
        $exp = '03/2026';
        $cvv = '963';
        $brand = 'mastercard';
        $amount = 100;
        $name = 'Antonio Marques Xavier';

        try {
            $sale = new Sale(rand());
            $customer = $sale->customer($name);
            $payment = $sale->payment($amount, 1);
            // $payment->setSoftDescriptor('JERIFERIAS');
            $payment->setCapture(true);
            $cardType = self::getType(brand);
            $payment->creditCard($cvv, $cardType)
                    ->setExpirationDate($exp)
                    ->setCardNumber($cc)
                    ->setHolder($name);
            $sale = (self::getEcommerce())->createSale($sale);
            $objPayment = $sale->getPayment();
            $paymentId = $objPayment->getPaymentId();
            dd(objPayment);
        } catch (CieloRequestException $e) {
            return $e->getCieloError()->getMessage();
        }
    }

    private function getEcommerce() {
        return new CieloEcommerce($this->MERCHANT, $this->ENVIRONMENT);
    }

    private function getType($cardType){
        if($cardType == "visa"){
            return CreditCard::VISA;
        }else if($cardType == "mastercard"){
            return CreditCard::MASTERCARD;
        }else if($cardType == "amex"){
            return CreditCard::AMEX;
        }else if($cardType == "dinersclub"){
            return CreditCard::DINERS;
        }else if($cardType == "elo"){
            return CreditCard::ELO;
        }else if($cardType == "Aura"){
            return CreditCard::AURA;
        }else if($cardType == "discover"){
            return CreditCard::DISCOVER;
        }else if($cardType == "hipercard"){
            return CreditCard::HIPERCARD;
        }else if($cardType == "jcb"){
            return CreditCard::JCB;
        }else{
            return null;
        }
    }
}
