<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.customscrollbar
 *
 * @copyright   (C) 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;

/**
 * Custom Scrollbar Plugin.
 *
 * @since  1.5
 */
class PlgSystemCustomscrollbar extends CMSPlugin
{
	/**
	 * Application object.
	 *
	 * @var    CMSApplicationInterface
	 */
	protected $app;

	public function SiteScrollbar()
	{
		$style = '::-webkit-scrollbar{
          width:' . str_replace(' ', '', $this->params->get('tkswidth', '12px')) . ';
          background-color:' . $this->params->get('tksbgcolor', '#ffffff') . ';
           height: ' . str_replace(' ', '', $this->params->get('tkswidth', '12px')) . ';';

		if ($this->params->get('tksborder', '1'))
		{
			$style .= 'border: ' . str_replace(' ', '', $this->params->get('tksbwidth', '0')) . ' ' . $this->params->get('tksbcolor', '#ffffff') . ' ' . $this->params->get('tksbstyle', 'solid') . ';

               border-radius:' . str_replace(' ', '', $this->params->get('tksbradius', '100px')) . ';}';
		}

		   $style .= '::-webkit-scrollbar-thumb{
             width:' . str_replace(' ', '', $this->params->get('tkswidth', '12px')) . ';
             background-color:' . $this->params->get('tbsbgcolor', '#d1c9cf') . ';
              height: ' . str_replace(' ', '', $this->params->get('tkswidth', '12px')) . ';';

		if ($this->params->get('tbsborder', '1'))
		{
			$style .= 'border: ' . str_replace(' ', '', $this->params->get('tbsbwidth', '0')) . ' ' . $this->params->get('tbsbcolor', '#ffffff') . ' ' . $this->params->get('tbsbstyle', 'solid') . ';

                  border-radius:' . str_replace(' ', '', $this->params->get('tbsbradius', '100px')) . ';}';
		}

			  $style .= '::-webkit-scrollbar-thumb:hover{
                width:' . str_replace(' ', '', $this->params->get('tkswidth', '12px')) . ';
                background-color:' . $this->params->get('tbhsbgcolor', '#787878') . ';
                 height: ' . str_replace(' ', '', $this->params->get('tkswidth', '12px')) . ';';

		if ($this->params->get('tbhsborder', '1'))
		{
			$style .= 'border: ' . str_replace(' ', '', $this->params->get('tbhsbwidth', '0')) . ' ' . $this->params->get('tbhsbcolor', '#ffffff') . ' ' . $this->params->get('tbhsbstyle', 'solid') . ';

                     border-radius:' . str_replace(' ', '', $this->params->get('tbhsbradius', '100px')) . ';}';
		}

		  return $style;
	}


	public function AdminScrollbar()
	{
		$style = '::-webkit-scrollbar{
          width:' . str_replace(' ', '', $this->params->get('tkawidth', '12px')) . ';
          background-color:' . $this->params->get('tkabgcolor', '#ffffff') . ';
           height: ' . str_replace(' ', '', $this->params->get('tkawidth', '12px')) . ';';

		if ($this->params->get('tkaborder', '1'))
		{
			$style .= 'border: ' . str_replace(' ', '', $this->params->get('tkabwidth', '0')) . ' ' . $this->params->get('tkabcolor', '#ffffff') . ' ' . $this->params->get('tkabstyle', 'solid') . ';

               border-radius:' . str_replace(' ', '', $this->params->get('tkabradius', '100px')) . ';}';
		}

		   $style .= '::-webkit-scrollbar-thumb{
             width:' . str_replace(' ', '', $this->params->get('tkawidth', '12px')) . ';
             background-color:' . $this->params->get('tbabgcolor', '#d1c9cf') . ';
              height: ' . str_replace(' ', '', $this->params->get('tkawidth', '12px')) . ';';

		if ($this->params->get('tbaborder', '1'))
		{
			$style .= 'border: ' . str_replace(' ', '', $this->params->get('tbabwidth', '0')) . ' ' . $this->params->get('tbabcolor', '#ffffff') . ' ' . $this->params->get('tbabstyle', 'solid') . ';

                  border-radius:' . str_replace(' ', '', $this->params->get('tbabradius', '100px')) . ';}';
		}

			  $style .= '::-webkit-scrollbar-thumb:hover{
                width:' . str_replace(' ', '', $this->params->get('tkawidth', '12px')) . ';
                background-color:' . $this->params->get('tbhabgcolor', '#787878') . ';
                 height: ' . str_replace(' ', '', $this->params->get('tkawidth', '12px')) . ';';

		if ($this->params->get('tbhaborder', '1'))
		{
			$style .= 'border: ' . str_replace(' ', '', $this->params->get('tbhabwidth', '0')) . ' ' . $this->params->get('tbhabcolor', '#ffffff') . ' ' . $this->params->get('tbhabstyle', 'solid') . ';

                     border-radius:' . str_replace(' ', '', $this->params->get('tbhabradius', '100px')) . ';}';
		}

		  return $style;
	}

	public function onBeforeCompileHead()
	{
		$doc = Factory::getDocument();
		$site = $this->SiteScrollbar();
		$admin = $this->AdminScrollbar();

		if ($this->app->isClient('site'))
		{
			if ($this->params->get('site', '1'))
			{
				$doc->addStyleDeclaration($site);
			}
		}

		else
		{
			if ($this->params->get('admin', '1'))
			{
				$doc->addStyleDeclaration($admin);
			}
		}
	}
}
