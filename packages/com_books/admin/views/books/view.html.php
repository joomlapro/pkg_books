<?php
/**
 * @package		Books
 * @subpackage	com_books
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of books.
 *
 * @package     Books
 * @subpackage  com_books
 * @since       2.5
 */
class BooksViewBooks extends JView
{
	protected $categories;
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  A template file to load. [optional]
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @since   1.6
	 */
	public function display($tpl = null)
	{
		// Initialise variables.
		$this->categories	= $this->get('CategoryOrders');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Add style
		$doc = JFactory::getDocument();
		$doc->setTitle(JText::_('COM_BOOKS_BOOKS_TITLE'));
		$doc->addStyleSheet(JURI::root() . 'media/com_books/css/backend.css');
		
		$this->addToolbar();
		// Include the component HTML helpers.
		JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT . '/helpers/books.php';

		$canDo = BooksHelper::getActions($this->state->get('filter.category_id'));
		$user = JFactory::getUser();
		JToolBarHelper::title(JText::_('COM_BOOKS_MANAGER_BOOKS'), 'books.png');
		if (count($user->getAuthorisedCategories('com_books', 'core.create')) > 0)
		{
			JToolBarHelper::addNew('book.add');
		}

		if (($canDo->get('core.edit')))
		{
			JToolBarHelper::editList('book.edit');
		}

		if ($canDo->get('core.edit.state'))
		{
			if ($this->state->get('filter.state') != 2)
			{
				JToolBarHelper::divider();
				JToolBarHelper::publish('books.publish', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::unpublish('books.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			}

			if ($this->state->get('filter.state') != -1)
			{
				JToolBarHelper::divider();
				if ($this->state->get('filter.state') != 2)
				{
					JToolBarHelper::archiveList('books.archive');
				}
				elseif ($this->state->get('filter.state') == 2)
				{
					JToolBarHelper::unarchiveList('books.publish');
				}
			}
		}

		if ($canDo->get('core.edit.state'))
		{
			JToolBarHelper::checkin('books.checkin');
		}

		if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'books.delete', 'JTOOLBAR_EMPTY_TRASH');
			JToolBarHelper::divider();
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolBarHelper::trash('books.trash');
			JToolBarHelper::divider();
		}

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_books');
			JToolBarHelper::divider();
		}
		JToolBarHelper::help('books', $com = true);
	}
}
