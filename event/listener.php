<?php
/**
*
* @package phpBB Extension - Knuffel
* @copyright (c) 2015 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\knuffel\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\template\template;
use phpbb\controller\helper;

class listener implements EventSubscriberInterface
{
	/** @var template */
	protected $template;

	/** @var helper */
	protected $helper;

	/**
	* Constructor
	*
	* @param template		$template
	* @param helper			$helper
	*
	*/
	public function __construct(
		template $template,
		helper $helper
	)
	{
		$this->template				= $template;
		$this->helper 				= $helper;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'		=> 'load_language_on_setup',
			'core.page_header'		=> 'page_header',
			'core.permissions'		=> 'permissions',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'dmzx/knuffel',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function page_header($event)
	{
		$this->template->assign_vars(array(
			'U_KNUFFEL'		=> $this->helper->route('dmzx_knuffel_controller'),
		));
	}

	public function permissions($event)
	{
		$permissions = $event['permissions'];
		$permissions['u_use_knuffel'] = array('lang' => 'ACL_U_USE_KNUFFEL', 'cat' => 'misc');
		$event['permissions'] = $permissions;
	}
}
