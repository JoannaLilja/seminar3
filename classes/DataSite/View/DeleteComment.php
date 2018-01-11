<?php
namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;
use DataSite\Util\Constants;


class DeleteComment extends AbstractRequestHandler
{

    private $id;
    private $type;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setType($type)//needed for returning to the correct page
    {
        $this->type = $type;
    }

    protected function doExecute()
    {
        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        //$this->addVariable('allData', $contr->getAllComments());

        $contr->deleteComment($this->id);

        //$result = $contr->getAllComments($this->type);

        $this->addVariable('allComments', $contr->getAllComments("meatballs"));

        $returnTo = 'subfolder/' . $this->type;
        return $returnTo;
        //header('Location: '.$type.'.php');

    }

}
