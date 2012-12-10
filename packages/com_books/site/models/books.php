<?php
/**
 * @package     Books
 * @subpackage  com_books
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Books Component Model
 * 
 * @package     Books
 * @subpackage  com_books
 * @since       2.5
 */
class BooksModelBooks extends JModelList
{

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 * 
	 * @param   string  $ordering   An optional ordering field.
	 * @param   string  $direction  An optional direction (asc|desc).
	 * 
	 * @return  void
	 *
	 * @since   2.5
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication();

		// Get the parent id if defined.
		$parentId = JRequest::getInt('id');
		$this->setState('filter.parentId', $parentId);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);

		$this->setState('filter.published', 1);
		$this->setState('filter.access', true);
	}

	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return  string	An SQL query
	 * 
	 * @since   2.5
	 */
	public function getListQuery()
	{
		$query = parent::getListQuery();
		$query->select('a.id, a.catid, a.title, a.alias, a.author, a.isbn, a.pages, a.year, a.editor, a.link, a.image, a.description, a.ordering, a.published');
		$query->from('#__books AS a');

		// Join over the categories.
		$query->select('c.title AS category_title, c.lft');
		$query->join('LEFT', '#__categories AS c ON c.id = a.catid');
		$query->where('a.published = 1');

		// Order
		$query->order('c.lft ASC');
		$query->order('a.ordering ASC');

		return $query;
	}
}
