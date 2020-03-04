<?php
    session_start();
    
    require('app/config/database.php');
    require('app/model/Database.php');
    require('app/model/PostModel.php');
    require('app/controller/PostController.php');

    $post = new PostController;
?>