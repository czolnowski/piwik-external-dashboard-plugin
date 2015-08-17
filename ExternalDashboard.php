<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\ExternalDashboard;

use Piwik\Common;

class ExternalDashboard extends \Piwik\Plugin
{
    public function getListHooksRegistered()
    {
        return array(
            'Platform.initialized' => 'afterPlatformInitialization'
        );
    }

    public function afterPlatformInitialization()
    {
        $module = Common::getRequestVar('module', '', 'string');
        $settings = new Settings();
        if (empty($module) && $settings->getSetting('useAsStartingPage')->getValue()) {
            $_GET['module'] = 'ExternalDashboard';
        }
    }
}
