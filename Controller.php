<?php
namespace Piwik\Plugins\ExternalDashboard;

use Piwik\Access;
use Piwik\Url;
use Piwik\View;

class Controller extends \Piwik\Plugin\Controller
{
    public function index()
    {
        return $this->renderTemplate(
            'index',
            array(
                'login' => Access::getInstance()->getLogin(),
                'tokenAuth' => Access::getInstance()->getTokenAuth(),
                'host' => Url::getCurrentHost()
            )
        );
    }
}
