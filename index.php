<?php

require_once "/lib/Comment.php";
require_once "/lib/PDO.php";
require_once "/lib/CommentsMapper.php";
require_once "/lib/functions.php";

$mapper = new CommentsMapper($DBH);

if (isset($_POST['submit'])){
   
    $comment = new Comment;
    $comment->setFields($_POST);
    $error = $comment->checkFields();
    if (!$error) {       
        $mapper->addComment($comment);
        header("Location: index.php");
        die();
    }
}

$comments = $mapper->getAllComments();

include("templates/index.html");