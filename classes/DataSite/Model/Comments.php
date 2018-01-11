<?php

namespace DataSite\Model;
use mysqli;


/**
 * An in-memory storage of all data entered in the current session.
 */
class Comments
{

    public function __construct()
    {

    }

    private function contains($haystack, $needle)
    {
      return (strpos($haystack, $needle) !== false);
    }

    private function sanitize($string)
    {

      $validChars = ' abcdefghijklmnopqrstuvxyzåäöABCDEFGHIJKLMNOPQRSTUVQYXÅÄÖ?.-!"';
      $stringLength = strlen($string);
      $constrString = "";

      for($i = 0; $i <= $stringLength; $i++)
      {
        $char = substr($string, $i, 1);
        $found = $this->contains($validChars, $char);

        if ($found)
        {
          $constrString = ($constrString . $char);
        }
      }

      return $constrString;

    }

    public function addComment($username, $comment, $type)
    {

      $config = parse_ini_file('C:/Users/Admin/Documents/Secret_Passwords_TastyRecipes/config.ini');

      //var_dump('username: ['. $username . ']' . 'comment: [' . $comment . '] type: [' . $type . ']');
      //die();
      $dbcon = new mysqli("localhost", $config['user'],$config['password'],$config['dbname']);

      $type_id = $dbcon->query('SELECT * FROM recipe WHERE name="'.$type.'"')->fetch_assoc()['id'];
      $user_id = $dbcon->query('SELECT * FROM credentials WHERE username="'.$username.'"')->fetch_assoc()['id'];


      $sanComment = $this->sanitize($comment);
      //$dbcon->query('INSERT INTO comments (user_id, type, comment) VALUES (1,1,"query test")');

      if($sanComment !== "")
      {
        $dbcon->query('INSERT INTO comments (user_id, type, comment) VALUES ('. $user_id .', ' . $type_id . ', "' . $sanComment . '")');
      }
      else
      {
        echo("Sorry, your comment contained no valid characters and thus could not be posted. ");
      }

      $dbcon->close();

    }

    public function deleteComment($id)
    {

      $config = parse_ini_file('C:/Users/Admin/Documents/Secret_Passwords_TastyRecipes/config.ini');


      $dbcon = new mysqli("localhost", $config['user'],$config['password'],$config['dbname']);

      //$type_id = $dbcon->query('SELECT * FROM recipe WHERE name="'.$type.'"')->fetch_assoc()['id'];
      //$result = $dbcon->query('SELECT * FROM comments JOIN credentials ON comments.user_id = credentials.id WHERE type='.$type_id);

      $dbcon->query('DELETE FROM comments WHERE comment_id = '.$id);
      //var_dump($result->fetch_assoc());
      //exit();

      $dbcon->close();

      return $result;

    }

    public function getAllComments($type)
    {

        $config = parse_ini_file('C:/Users/Admin/Documents/Secret_Passwords_TastyRecipes/config.ini');

        $dbcon = new mysqli("localhost", $config['user'],$config['password'],$config['dbname']);

        $type_id = $dbcon->query('SELECT * FROM recipe WHERE name="'.$type.'"')->fetch_assoc()['id'];
        //$result = $dbcon->query('SELECT * FROM comments JOIN credentials ON comments.user_id = credentials.id WHERE type='.$type_id);

        $result = $dbcon->query('SELECT * FROM comments JOIN credentials ON comments.user_id = credentials.id WHERE type='.$type_id);

        //var_dump($result->fetch_assoc());
        //exit();

        $dbcon->close();

        return $result;

    }
}
