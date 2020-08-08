<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Language;
use RocketTheme\Toolbox\Event\Event;

class FullcalendarPlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
            'onTwigPageVariables' => ['onTwigPageVariables', 0]
        ];
    }

    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }
        // Enable the main events we are interested in
        $this->enable([
            'onShortcodeHandlers' => ['onShortcodeHandlers', 0],
            'onTwigTemplatePaths' => ['onTwigTemplatePaths',0]
        ]);
        //add assets
        $assets = $this->grav['assets'];
        $assets->addJs('plugin://fullcalendar/assets/dist/bundle.js'); 

        $assets->addJs('plugin://fullcalendar/assets/monthpic.js');
        $assets->addCss('plugin://fullcalendar/assets/daygrid.css');  // default CSS for #calendar

        //map plugin config
        $configJSON = json_encode($this->grav['config']);
        $assets->addInlineJs("var GRAV = {};GRAV.config = JSON.parse('" . addslashes($configJSON) . "');", ['loading'=>'inline', 'position'=>'before']); 
        //@TODO retrieve page.header ... (another event?)
    }


    public function onTwigPageVariables() 
    {
      $assets = $this->grav['assets'];
      $page = $this->grav['pages']->find('/evenements/_calendar');
      $headers = json_encode($page->header());
      //$configJSON = '[{"ics":"/user/data/calendars/darbatook-2020-07-11.ics", "color":"blue", "name":"darbatook"}]';
      $assets->addInlineJs("GRAV.page = {header:''};  GRAV.page.header = JSON.parse('" . addslashes($headers) . "');", ['loading'=>'inline', 'position'=>'before']); 
    }

    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    public function onShortcodeHandlers(Event $e)
    {
        $this->grav['shortcode']->registerAllShortcodes(__DIR__.'/shortcodes');
    }
}
