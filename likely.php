<?php

// no direct access
defined( '_JEXEC' ) or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\Event\Event;
use Joomla\Event\SubscriberInterface;

class PlgContentLikely extends CMSPlugin implements SubscriberInterface
{
    /**
     * Load the language file on instantiation
     *
     * @var    boolean
     * @since  3.1
     */
    protected $autoloadLanguage = true;

    protected $app;

    /**
     * Returns an array of events this subscriber will listen to.
     *
     * @return  array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onContentAfterDisplay' => 'displayButtons',
        ];
    }

    /**
     * Plugin method is the array value in the getSubscribedEvents method
     * The plugin then modifies the Event object (if it's not immutable)
     */
     public function displayButtons(Event $event)
     {
        /*
         * Plugin code goes here.
         * You can access parameters via $this->params
         */

         $wa = $this->app->getDocument()->getWebAssetManager();
         $wa->registerScript('likely', 'plg_content_likely/likely.js');
         $wa->useScript('likely');

         $path = PluginHelper::getLayoutPath('content', 'likely');

         ob_start();
         require $path;
         $result = ob_get_clean();

        return $result;
    }
}
?>
