<?php
namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;

class LoginPage extends AbstractRequestHandler
{

  protected function doExecute()
  //return path to the file with the next view
  {
    return 'subfolder/signup';
  }


  //put your code here
}
