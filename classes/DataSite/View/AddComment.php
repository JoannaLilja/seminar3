<?php
namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;
use DataSite\Util\Constants;


class AddComment extends AbstractRequestHandler
{

    private $username;
    private $comment;
    private $type;

    public function setUsername($username)
    {
        $this->username = $username;

    }

    public function setComment($comment)
    {
        $this->comment = $comment;

    }

    public function setType($type)
    {
        $this->type = $type;

    }

    protected function doExecute()
    {

      //var_dump($this->type);die();

        $contr = $this->session->get(Constants::CONTR_KEY_NAME);
        //$this->addVariable('allData', $contr->getAllComments());

        $contr->addComment($this->username,$this->comment,$this->type);

        //$result = $contr->getAllComments();


        $this->addVariable('allComments', $contr->getAllComments($this->type));
        //$this->addVariable('allComments', $result);

        $returnTo = 'subfolder/' . $this->type;
        return $returnTo;
        //header('Location: '.$type);

    }

}
