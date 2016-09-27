<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesSeeder extends Seeder
{
    /**
     * The Main users seeder
     *
     * @return void
     */
    public function run()
    {

        $r = new \App\Rol();
        $r -> name          = 'Técnico';
        $r -> description   = 'Técnico de la empresa';
        $r -> save();

        $r = new \App\Rol();
        $r -> name          = 'Vendedor';
        $r -> description   = 'Vendedor de la empresa';
        $r -> save();

        $r = new \App\Rol();
        $r -> name          = 'Agente';
        $r -> description   = 'Agente de la empresa';
        $r -> save();

        $r = new \App\Rol();
        $r -> name          = 'Soporte';
        $r -> description   = 'Soporte de la empresa';
        $r -> save();

        $r = new \App\Rol();
        $r -> name          = 'Abogado';
        $r -> description   = 'Abogado de la empresa';
        $r -> save();

        $r = new \App\Rol();
        $r -> name          = 'Gerente';
        $r -> description   = 'Gerente de la empresa';
        $r -> save();

        $r = new \App\Rol();
        $r -> name          = 'Director';
        $r -> description   = 'Director de la empresa';
        $r -> save();


        //We are adding the first role to the first user for testing purposes.

        $dated = new \DateTime();

        DB::table('users_roles')->insert([
            'user_id'           =>      1,
            'rol_id'            =>      1,
            'status'            =>      1,
            'created_at'        =>      $dated,
            'updated_at'        =>      $dated,
        ]);

    }
}