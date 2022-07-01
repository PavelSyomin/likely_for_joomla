<?php
/**
 * @package     Likly, a Joomla plugin
 *
 * @author      Pavel Syomin
 * @copyright   Copyright © Pavel Syomin, 2022
 * @license     GNU General Public License version 3; see LICENSE.txt
 */

// no direct access
defined( '_JEXEC' ) or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Language\Text;


class PlgContentLikely extends CMSPlugin
{
    protected const AVAIL_BUTTONS = ['twitter', 'facebook', 'linkedin',
        'reddit', 'vkontakte', 'odnoklassniki', 'whatsapp', 'viber', 'telegram',
        'pinterest'];

    protected $autoloadLanguage = true;

    protected $app;

    protected $theme;

    protected $size;

    protected $counters;

    protected $buttons;

    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);

        $this->theme = $this->params->get('theme', 'normal');
        $this->size  = $this->params->get('size', 'medium');
        $this->counters = $this->params->get('counters', 1);
        $this->getButtons();
    }

    public function onContentAfterDisplay($context, &$row, &$params, $page = 0)
    {
        $parts = explode('.', $context);
        $view  = $this->app->input->getString('view', '');
        $isSite = $this->app->isClient('site');

        if ($parts[0] !== 'com_content' or $view !== 'article' or !$isSite)
        {
            return;
        }

        $wa = $this->app->getDocument()->getWebAssetManager();
        $wa->registerAndUseScript('likely', 'plg_content_likely/likely.js');
        $wa->registerAndUseStyle('likely', 'plg_content_likely/likely.css');

        $path = PluginHelper::getLayoutPath('content', 'likely');

        ob_start();
        require $path;
        $result = ob_get_clean();

        return $result;
    }

    protected function getButtons()
    {
        $buttons = [];

        foreach (self::AVAIL_BUTTONS as $buttonName)
        {
            $isActive = $this->params->get('show_' . $buttonName, 1);
            if (!$isActive) continue;

            $buttonText = $this->getButtonText($buttonName);
            $buttonOrder = $this->params->get($buttonName . '_button_order', 0);
            $buttonAriaLabel = Text::sprintf(Text::_('PLG_CONTENT_LIKELY_ARIA_LABEL'), ucfirst($buttonName));

            $buttons[] = [$buttonName, $buttonText, $buttonOrder, $buttonAriaLabel];
        }

        usort($buttons, function($a, $b)
            {
                if ($a[2] != $b[2])
                {
                    return $a[2] > $b[2] ? 1 : -1;
                }
                else
                {
                    return strcmp($a[1], $b[1]);
                }
            });

        $this->buttons = $buttons;
    }

    protected function getButtonText($buttonName)
    {
        $text = $this->params->get($buttonName . '_button_text', '');

        if ($text === '')
        {
            $textConstant = 'PLG_CONTENT_LIKELY_' . strtoupper($buttonName) . '_BUTTON_TEXT_DEFAULT';
            $text = Text::_($textConstant);
        }

        return $text;
    }
}
