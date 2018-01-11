<?php

namespace DataSite\Controller;

use DataSite\Model\Comments;
use DataSite\Model\Users;

/**
 * The application's controller, all calls to the model pass through here.
 */
 class Controller {

     private $comments;
     private $users;

     public function __construct() {
         $this->comments = new Comments();
         $this->users = new Users();
     }

     public function addComment($username, $comment, $type)
     {
         $this->comments->addComment($username, $comment, $type);
     }

     public function deleteComment($id)
     {
         $this->comments->deleteComment($id);
     }

     public function getAllComments($type)
     {
        //  $result = $this->comments->getAllComments($type_id);
        // var_dump($result->fetch_assoc());
        // exit();
         return $this->comments->getAllComments($type);
     }

     public function authenticateUser($username, $password)
     {
         $this->users->authenticateUser($username, $password);
     }

 }
