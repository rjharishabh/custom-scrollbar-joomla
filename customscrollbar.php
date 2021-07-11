<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.cache
 *
 * @copyright   (C) 2007 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;


/**
 * Joomla! Page Cache Plugin.
 *
 * @since  1.5
 */
class PlgSystemCustomscrollbar extends CMSPlugin
{
    protected $app;

    public function SiteScrollbar(){
        $p='::-webkit-scrollbar{
          width:20px;
          background-color:'.$this->params->get('bg').';
          border: 5px red solid;
          height: 5px;
          border-radius: 100px;}';
          $p.='::-webkit-scrollbar-thumb{'.
 'background-color:#c00005;'.
 'border-radius: 100px;'.
 'border: 2px red solid;}'.
 '::-webkit-scrollbar-thumb:hover{'
     .'background-color:#007bff;}';

          return $p;
        }


    public function AdminScrollbar(){

    }

    public function onBeforeCompileHead(){
        $document = Factory::getDocument();
        $s=$this->SiteScrollbar();
    
        if ($this->app->isClient('site')) {
                $document->addStyleDeclaration($s);
        }


    }
}
