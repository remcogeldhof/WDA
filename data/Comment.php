<?php

class Comment {
    public $commentID;
    public $comment;
    public $auteurID;
    public $blogID;

    public function __construct($commentID, $comment, $auteurID, $blogID){
        $this->commentID = $commentID;
        $this->comment = $comment;
        $this->auteurID = $auteurID;
        $this->blogID = $blogID;

    }
}

