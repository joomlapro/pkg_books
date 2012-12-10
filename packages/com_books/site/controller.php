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
		$cachable = true;

		// Get the document object.
		$document = JFactory::getDocument();

		// Set the default view name and format from the Request.
		$vName = JRequest::getCmd('view', 'books');
		JRequest::setVar('view', $vName);
		$user = JFactory::getUser();
		$safeurlparams = array('catid' => 'INT', 'id' => 'INT', 'cid' => 'ARRAY', 'year' => 'INT', 'month' => 'INT', 'limit' => 'INT', 'limitstart' => 'INT', 'showall' => 'INT', 'return' => 'BASE64', 'filter' => 'STRING', 'filter_order' => 'CMD', 'filter_order_Dir' => 'CMD', 'filter-search' => 'STRING', 'print' => 'BOOLEAN', 'lang' => 'CMD');
		parent::display($cachable, $safeurlparams);
		return $this;
	}
}
