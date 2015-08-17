<?php
namespace Piwik\Plugins\ExternalDashboard;

use Piwik\Settings\UserSetting;

/**
 * Defines Settings for ExternalDashboard.
 */
class Settings extends \Piwik\Plugin\Settings
{
    /**
     * @var bool
     */
    public $useAsStartingPage = false;

    protected function init()
    {
        $this->setIntroduction('Here you can specify the settings for this plugin.');

        $this->useAsStartingPageSetting();
    }

    private function useAsStartingPageSetting()
    {
        $this->useAsStartingPage = new UserSetting('useAsStartingPage', 'Use External dashboard as starting page');
        $this->useAsStartingPage->type = static::TYPE_BOOL;
        $this->useAsStartingPage->uiControlType = static::CONTROL_CHECKBOX;
        $this->useAsStartingPage->description = 'If enabled, External dashboard will be your starting page';
        $this->useAsStartingPage->defaultValue = false;

        $this->addSetting($this->useAsStartingPage);
    }
}
