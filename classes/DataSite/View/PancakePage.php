<?php
namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;
use DataSite\Util\Constants;

class PancakePage extends AbstractRequestHandler
{

  protected function doExecute()
  {

    $contr = $this->session->get(Constants::CONTR_KEY_NAME);
    $this->addVariable('allComments', $contr->getAllComments("pancakes"));



    return 'subfolder/pancakes';
  }

}
