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
		$params = $this->params;

		$tkswidth = $params->get('tkswidth', '12px');
		$tksbgcolor = $params->get('tksbgcolor', '#ffffff');
		$tksborder = $params->get('tksborder', '1');
		$tksbwidth = $params->get('tksbwidth', '0');
		$tksbcolor = $params->get('tksbcolor', '#ffffff');
		$tksbstyle = $params->get('tksbstyle', 'solid');
		$tksbradius = $params->get('tksbradius', '100px');
		$tbsbgcolor = $params->get('tbsbgcolor', '#d1c9cf');
		$tbsborder = $params->get('tbsborder', '1');
		$tbsbwidth = $params->get('tbsbwidth', '0');
		$tbsbcolor = $params->get('tbsbcolor', '#ffffff');
		$tbsbstyle = $params->get('tbsbstyle', 'solid');
		$tbsbradius = $params->get('tbsbradius', '100px');
		$tbhsbgcolor = $params->get('tbhsbgcolor', '#787878');
		$tbhsborder = $params->get('tbhsborder', '1');
		$tbhsbwidth = $params->get('tbhsbwidth', '0');
		$tbhsbcolor = $params->get('tbhsbcolor', '#ffffff');
		$tbhsbstyle = $params->get('tbhsbstyle', 'solid');
		$tbhsbradius = $params->get('tbhsbradius', '100px');

		$style = '::-webkit-scrollbar {
          width:' . str_replace(' ', '', $tkswidth) . ';
          background-color:' . $tksbgcolor . ';
           height: ' . str_replace(' ', '', $tkswidth) . ';';

		if ($tksborder)
		{
			$style .= 'border: ' . str_replace(' ', '', $tksbwidth) . ' ' . $tksbcolor . ' ' . $tksbstyle . ';

               border-radius:' . str_replace(' ', '', $tksbradius) . ';}';
		}

		   $style .= '::-webkit-scrollbar-thumb {
             width:' . str_replace(' ', '', $tkswidth) . ';
             background-color:' . $tbsbgcolor . ';
              height: ' . str_replace(' ', '', $tkswidth) . ';';

		if ($tbsborder)
		{
			$style .= 'border: ' . str_replace(' ', '', $tbsbwidth) . ' ' . $tbsbcolor . ' ' . $tbsbstyle . ';

                  border-radius:' . str_replace(' ', '', $tbsbradius) . ';}';
		}

			  $style .= '::-webkit-scrollbar-thumb:hover{
                width:' . str_replace(' ', '', $tkswidth) . ';
                background-color:' . $tbhsbgcolor . ';
                 height: ' . str_replace(' ', '', $tkswidth) . ';';

		if ($tbhsborder)
		{
			$style .= 'border: ' . str_replace(' ', '', $tbhsbwidth) . ' ' . $tbhsbcolor . ' ' . $tbhsbstyle . ';

                     border-radius:' . str_replace(' ', '', $tbhsbradius) . ';}';
		}

		  return $style;
	}


	public function AdminScrollbar()
	{
		$params = $this->params;

		$tkawidth = $params->get('tkawidth', '12px');
		$tkabgcolor = $params->get('tkabgcolor', '#ffffff');
		$tkaborder = $params->get('tkaborder', '1');
		$tkabwidth = $params->get('tkabwidth', '0');
		$tkabcolor = $params->get('tkabcolor', '#ffffff');
		$tkabstyle = $params->get('tkabstyle', 'solid');
		$tkabradius = $params->get('tkabradius', '100px');
		$tbabgcolor = $params->get('tbabgcolor', '#d1c9cf');
		$tbaborder = $params->get('tbaborder', '1');
		$tbabwidth = $params->get('tbabwidth', '0');
		$tbabcolor = $params->get('tbabcolor', '#ffffff');
		$tbabstyle = $params->get('tbabstyle', 'solid');
		$tbabradius = $params->get('tbabradius', '100px');
		$tbhabgcolor = $params->get('tbhabgcolor', '#787878');
		$tbhaborder = $params->get('tbhaborder', '1');
		$tbhabwidth = $params->get('tbhabwidth', '0');
		$tbhabcolor = $params->get('tbhabcolor', '#ffffff');
		$tbhabstyle = $params->get('tbhabstyle', 'solid');
		$tbhabradius = $params->get('tbhabradius', '100px');

		$style = '::-webkit-scrollbar {
          width:' . str_replace(' ', '', $tkawidth) . ';
          background-color:' . $tkabgcolor . ';
           height: ' . str_replace(' ', '', $tkawidth) . ';';

		if ($tkaborder)
		{
			$style .= 'border: ' . str_replace(' ', '', $tkabwidth) . ' ' . $tkabcolor . ' ' . $tkabstyle . ';

               border-radius:' . str_replace(' ', '', $tkabradius) . ';}';
		}

		   $style .= '::-webkit-scrollbar-thumb {
             width:' . str_replace(' ', '', $tkawidth) . ';
             background-color:' . $tbabgcolor . ';
              height: ' . str_replace(' ', '', $tkawidth) . ';';

		if ($tbaborder)
		{
			$style .= 'border: ' . str_replace(' ', '', $tbabwidth) . ' ' . $tbabcolor . ' ' . $tbabstyle . ';

                  border-radius:' . str_replace(' ', '', $tbabradius) . ';}';
		}

			  $style .= '::-webkit-scrollbar-thumb:hover{
                width:' . str_replace(' ', '', $tkawidth) . ';
                background-color:' . $tbhabgcolor . ';
                 height: ' . str_replace(' ', '', $tkawidth) . ';';

		if ($tbhaborder)
		{
			$style .= 'border: ' . str_replace(' ', '', $tbhabwidth) . ' ' . $tbhabcolor . ' ' . $tbhabstyle . ';

                     border-radius:' . str_replace(' ', '', $tbhabradius) . ';}';
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
