<?php
/**
 * @package     Books
 * @subpackage  com_books
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Books component helper.
 *
 * @package     Books
 * @subpackage  com_books
 * @since       2.5
 */
class BooksHelper
{
	public static $extension = 'com_books';

	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since   2.5
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_BOOKS_SUBMENU_BOOKS'),
			'index.php?option=com_books&view=books',
			$vName == 'books'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_BOOKS_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_books',
			$vName == 'categories'
		);
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 */
	public static function getActions()
	{
		$user		= JFactory::getUser();
		$result		= new JObject;
		$assetName	= 'com_books';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
