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

        $text = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non placerat felis. Nullam nec consequat velit. Sed at dolor aliquam, pellentesque sapien at, fermentum ligula. Nunc at quam quis tortor auctor faucibus ut sit amet enim. Suspendisse odio neque, lacinia ut posuere non, ullamcorper eget urna. Quisque convallis gravida neque, quis eleifend mauris semper eget. Morbi vel diam pharetra, efficitur lectus ut, dictum dui. ',
            'Fusce nec neque ac nisl dapibus tempor. Nunc nulla arcu, maximus eu rhoncus quis, suscipit eget tellus. Proin ultrices, elit nec fermentum egestas, dolor tortor dapibus ligula, at rhoncus dui dui ut lectus. Sed consectetur posuere aliquam. In a malesuada odio. Proin convallis eros in ullamcorper euismod. Praesent eget enim a neque tincidunt rhoncus vitae at neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent consectetur, quam ut rhoncus posuere, augue tellus vestibulum ligula, nec finibus mi enim in orci. Nunc est nulla, tincidunt vitae rutrum et, congue sed nunc. In non vulputate eros, feugiat malesuada justo. Sed lobortis cursus mi, et cursus felis condimentum nec. ',
            'Aliquam elementum massa odio, a consequat ante vulputate vitae. Quisque vehicula aliquet nisl, placerat posuere felis lacinia imperdiet. Donec sit amet ipsum nec orci dictum consectetur eget at augue. Ut massa sapien, ornare quis sagittis ut, varius et velit. Duis ultrices consectetur justo ac tristique. Aenean bibendum ante a nulla sodales vulputate. Sed posuere libero sapien. In ipsum eros, sagittis vel ante et, aliquam vestibulum ligula. Integer vitae elit non nunc suscipit tempus. Phasellus at facilisis libero. Vivamus felis lacus, varius in libero nec, vehicula blandit libero. Proin vehicula dictum ante, quis vestibulum risus mollis ac. Proin dapibus enim scelerisque erat ultrices, vel rhoncus velit maximus. Quisque varius sollicitudin mi sed gravida. ',
            'Nullam porttitor enim vel dui interdum, quis aliquet enim accumsan. Fusce sem risus, varius nec congue ornare, feugiat sit amet mi. Donec at nunc ac nisi gravida tincidunt id at justo. Cras a porta felis. Pellentesque sit amet arcu sit amet justo gravida rutrum. Curabitur at nisl ultricies mi scelerisque condimentum id quis arcu. In ipsum eros, bibendum eget lectus fringilla, ullamcorper dapibus massa. Pellentesque nec sem ut enim molestie convallis ac sed diam. Nullam non mollis urna, eu pulvinar dui. Proin ante leo, sagittis eget iaculis ut, volutpat non enim. Aenean nec pulvinar arcu. Etiam arcu enim, feugiat ut sollicitudin dapibus, rhoncus et diam. Morbi eleifend mi ut mauris euismod rutrum. ',
            'Ut convallis interdum diam. Curabitur placerat felis eget elit tristique rhoncus. Donec sit amet odio euismod, convallis orci eget, commodo purus. Donec ultricies leo lacus, a iaculis ligula placerat at. Maecenas eu nunc non elit tempus interdum elementum ut mauris. Aliquam dictum porttitor mi, eget varius massa cursus a. In bibendum malesuada ipsum suscipit efficitur. Morbi egestas pulvinar turpis, non iaculis nisi. Integer consequat massa vel mi ullamcorper, quis vestibulum enim mattis. Fusce ornare ultricies mauris sit amet placerat. Proin ut bibendum eros. ',

        ];

        // The main user
        $u = new \App\User();
        $u -> username      = 'administrator';
        $u -> password      = bcrypt('123456');
        $u -> email         = 'administrator@example.com';
        $u -> firstname     =  'Admin';
        $u -> lastname      =  "istrator";
        $u -> administrator = 1;
        $u -> address       =   'Chicago';
        $u -> address2      =   'West Lake';
        $u -> sex           =   'M';
        $u -> phone         =   '(555)8956423';
        $u -> bio           =   'I am the super administrator. My will is your command.';
        $u -> details       =   'First user';
        $u -> studies       =   '3 years at NASA research center';
        $u -> location      =   'Los Santos';
        $u -> notes         =   'This are some notes.';
        $u -> skills        =   'Programming,Development,Self-learning';
        $u -> save();

        // The secondary user
        $u2 = new \App\User();
        $u2 -> username      = 'daniloramirez';
        $u2 -> password      = bcrypt('123456');
        $u2 -> email         = 'daniloramirez.cr@gmail.com';
        $u2 -> firstname     =  'Danilo';
        $u2 -> lastname      =  "Ramírez";
        $u2 -> administrator = 1;
        $u2 -> address       =   'Chicago';
        $u2 -> address2      =   'West Lake';
        $u2 -> sex           =   'M';
        $u2 -> phone         =   '(555)8956423';
        $u2 -> bio           =   'I am Danilo';
        $u2 -> details       =   'Second user';
        $u2 -> studies       =   '40 years on dont knowing what to do';
        $u2 -> location      =   'Los Santos';
        $u2 -> notes         =   'This are some notes.';
        $u2 -> skills        =   'Programming,Development,Self-learning';
        $u2 -> save();


        $status = [];

        $us = new \App\User_status();
        $us -> user_id = $u -> id;
        $us -> content = 'Welcome to this new instalation!';
        $us -> location = $u -> location;
        $us -> tags = '';
        $us -> save();

        $status[] = $us -> id;

        $us = new \App\User_status();
        $us -> user_id = $u -> id;
        $us -> content = $text[array_rand($text)];
        $us -> location = $u -> location;
        $us -> tags = '';
        $us -> save();

        $status[] = $us -> id;

        foreach($status AS $st){
            $number_of_comments = rand(1,6);
            for( $i=1 ; $i<$number_of_comments ; $i++ ){
                $uc = new \App\user_status_comment();
                $uc -> user_id = $u2 -> id;
                $uc -> status_id = $st;
                $uc -> content = $text[array_rand($text)];
                $uc -> location = $u2 -> location;
                $uc -> tags = '';
                $uc -> save();
            }
        }


    }
}