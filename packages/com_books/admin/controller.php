<?php
/**
 * @package     Books
 * @subpackage  com_books
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Books Component Controller
 *
 * @package     Books
 * @subpackage  com_books
 * @since       2.5
 */
class BooksController extends JController
{
	/**
	 * @var		string	The default view.
	 * @since	2.5
	 */
	protected $default_view = 'books';

	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   array    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  This object to support chaining.
	 *
	 * @since   2.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT . '/helpers/books.php';

		// Load the submenu.
		BooksHelper::addSubmenu(JRequest::getCmd('view', 'books'));

		$view	= JRequest::getCmd('view', 'books');
		$layout = JRequest::getCmd('layout', 'default');
		$id		= JRequest::getInt('id');

		parent::display();

		return $this;
	}
}
