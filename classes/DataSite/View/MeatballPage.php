<?php
namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;
use DataSite\Util\Constants;


class MeatballPage extends AbstractRequestHandler
{


    protected function doExecute()
    {
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        //$this->addVariable('allData', $contr->getAllComments());

        $this->addVariable('allComments', $contr->getAllComments("meatballs"));

        return 'subfolder/meatballs';
    }

}
