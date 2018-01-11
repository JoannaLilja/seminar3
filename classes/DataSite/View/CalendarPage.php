<?php
namespace DataSite\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Shows the calendar page of the implementation
 */
class CalendarPage extends AbstractRequestHandler
{
    protected function doExecute()
    //return path to the file with the next view
    {
        return 'subfolder/calendar';
    }


    //put your code here
}
