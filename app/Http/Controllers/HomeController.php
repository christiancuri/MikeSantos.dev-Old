<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Skill;

class HomeController extends Controller
{

    public function home(){

        $mSkills = Skill::all();

        $_skills['expert'] = [];
        $_skills['advanced'] = [];
        $_skills['intermediate'] = [];
        $_skills['beginner'] = [];

        foreach($mSkills as $skill){
            $exp = $skill['experience'];
            if($exp == Level::EXPERT){
                $_skills['expert'][] = $skill;
            }else
            if($exp == Level::ADVANCED){
                $_skills['advanced'][] = $skill;
            }else
            if($exp == Level::INTERMEDIATE){
                $_skills['intermediate'][] = $skill;
            }else
            if($exp == Level::BEGINNER){
                $_skills['beginner'][] = $skill;
            }
        }

        $skills = [];
        
        foreach($_skills as $array){
            foreach($array as $skill){
                array_push($skills, $skill);
            }
        }

        return view('welcome', compact('skills'));
    }

}
