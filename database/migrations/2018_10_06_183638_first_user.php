<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new App\User;
        $user->name = 'Mike Christian Santos Curi';
        $user->password = '$2y$10$ptU6HE353UKePtbM7an/heMiqJtsyMhDFKMOGtkKL5lZRWfRx/XyK';
        $user->email = 'contato.mikesantos@gmail.com';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = App\User::where('email', '=', 'contato.mikesantos@gmail.com');
        $user->delete();
    }
}
