<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
{
    /**
     * The Main users seeder
     *
     * @return void
     */
    public function run()
    {
        // The main user
        $u = new \App\User();
        $u -> username      = 'daniloramirez';
        $u -> password      = bcrypt('123456');
        $u -> email         = 'daniloramirez.cr@gmail.com';
        $u -> firstname     =  'Danilo';
        $u -> lastname      =  "Ramírez";
        $u -> administrator = 1;
        $u -> save();
    }
}