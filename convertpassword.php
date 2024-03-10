<?php
    require './config.php';
    require './classes/database.php';
    require './classes/user.php';
    $user = new User("happy123", 'happy123');
    $conn = require './inc/db.php';
    // if($user->addUser($conn)){
    //     echo 'add user successfully';
    // }else echo 'add user failed';

?>