<?php

namespace DataSite\Model;
use mysqli;

class Users
{

  public function __construct()
  {

  }

  public function authenticateUser($username, $password)
  {

    $config = parse_ini_file('C:/Users/Admin/Documents/Secret_Passwords_TastyRecipes/config.ini');

    $dbcon = new mysqli("localhost", $config['user'],$config['password'],$config['dbname']);

    $hash =  md5($_GET["password"]); //Creates a hash using a fixed salt

    if ($result = $dbcon->query('SELECT * FROM credentials WHERE username = "' . $_GET["username"] . '" AND  password= "' . $hash .'"'))
    {
      //var_dump($result->fetch_assoc());
      $_SESSION["user"] = $result->fetch_assoc(); //->fetch_assoc()
    }

    $dbcon->close();
  }
}
