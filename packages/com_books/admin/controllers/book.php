<?php
/**
 * @package     Books
 * @subpackage  com_books
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Book controller class.
 *
 * @package     Books
 * @subpackage  com_books
 * @since       2.5
 */
class BooksControllerBook extends JControllerForm
{
	/**
	 * @var    string  The prefix to use with controller messages.
	 * @since  2.5
	 */
	protected $text_prefix = 'COM_BOOKS_BOOK';
}
