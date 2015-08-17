<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\ExternalDashboard;

use Piwik\Common;
use Piwik\Menu\MenuAdmin;
use Piwik\Menu\MenuReporting;
use Piwik\Menu\MenuTop;
use Piwik\Menu\MenuUser;

/**
 * This class allows you to add, remove or rename menu items.
 * To configure a menu (such as Admin Menu, Reporting Menu, User Menu...) simply call the corresponding methods as
 * described in the API-Reference http://developer.piwik.org/api-reference/Piwik/Menu/MenuAbstract
 */
class Menu extends \Piwik\Plugin\Menu
{
    public function configureTopMenu(MenuTop $menu)
    {
        $url = $this->urlForAction('index');

        $date = Common::getRequestVar('date', '', 'string');
        $site = Common::getRequestVar('idSite', 0, 'int');

        if ($site > 0) {
            $externalUrl = '#/' . $site;

            if (!empty($date)) {
                $externalUrl .= '?date=' . date('Y-m-d', strtotime($date));
            }

            $url['externalDashboardHash'] = $externalUrl;
        }

        $menu->addItem('External dashboard', '', $url, 1);
    }
}
