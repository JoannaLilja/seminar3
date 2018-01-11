<?php

namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;
use DataSite\Controller\Controller;
use DataSite\Util\Constants;

/**
 * All requests without a url matching an existing request handler will be
 * redirected to the application's index page. That way, the url will always be
 * http://server name/context root/View/page name.
 *
 * This handler also starts a session and creates a controller.
 */
class DefaultRequestHandler extends AbstractRequestHandler {

    protected function doExecute() {
        $this->session->restart();
        $this->session->set(Constants::CONTR_KEY_NAME, new Controller());
        \header('Location: /seminar3_2/DataSite/View/FirstPage');
    }

}
