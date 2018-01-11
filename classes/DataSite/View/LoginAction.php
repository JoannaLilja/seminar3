<?php
namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;
use DataSite\Util\Constants;

class LoginAction extends AbstractRequestHandler
{

    private $username;
    private $password;

    public function setUsername($username)
    {
        //echo "1";
        $this->username = $username;
    }

    public function setPassword($password)
    {
        //echo "2";
        $this->password = $password;
        //doExecute();
    }


    protected function doExecute()
    //return path to the file with the next view
    {
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);

        //if (isset($username))
        $contr->authenticateUser($username, $password);
        $this->session->set(Constants::CONTR_KEY_NAME, $contr);

        return 'subfolder/login';
        
    }

}
