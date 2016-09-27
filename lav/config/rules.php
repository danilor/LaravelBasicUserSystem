<?php

return array(
        /*USER INFORMATION*/
        'user_id'               =>      'integer|exists:users,id',
        'firstname'             =>      'min:2',
        'lastname'              =>      'min:2',
        'fullname'              =>      '|min:3',
        'username'             	=>      'min:2',
        'email'                 =>      'email',
        'password'              =>      'min:6',
        'password_confirmation' =>      'min:6',
        'image_files'           =>      'image|min:1|max:12000',


);
