<?php
/**
 * @package     Books
 * @subpackage  com_books
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller = JController::getInstance('Books');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
