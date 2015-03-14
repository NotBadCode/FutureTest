<?php
class CommentsMapper
{
    public $DBH;
    
    public function __construct(PDO $DBH)
    {
        $this->DBH = $DBH;
    }
    
    public function getAllComments()
    {
        $STH = $this->DBH->prepare("SELECT * FROM comments ORDER BY id DESC");
        $STH->execute();
        return $STH->fetchAll(PDO::FETCH_CLASS, "comment");
    }

    public function addComment(Comment $comment)
    {

        $STH = $this->DBH->prepare("INSERT INTO comments (name, text) VALUES (:name, :text)");
        
        $STH->bindvalue(":name", $comment->getName());
        $STH->bindvalue(":text", $comment->getText());
        
        $STH->execute();
        $comment->setID($this->DBH->lastInsertId());
    }
    
}