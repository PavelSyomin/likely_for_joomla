<?php

// no direct access
defined( '_JEXEC' ) or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\Event\Event;
use Joomla\Event\SubscriberInterface;

class PlgContentLikely extends CMSPlugin
{

    protected $autoloadLanguage = true;

    protected $app;

    protected $theme;

    protected $size;

    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);

        $this->theme = $this->params->get('theme', 'normal');
        $this->size  = $this->params->get('size', 'medium');
    }

    public function onContentAfterDisplay($context, &$row, &$params, $page = 0)
    {
        $parts = explode('.', $context);
        $view  = $this->app->input->getString('view', '');

        if ($parts[0] !== 'com_content' or $view !== 'article')
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
}
