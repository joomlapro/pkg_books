<?php
/**
 * @package		Books
 * @subpackage	com_books
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$canDo = BooksHelper::getActions();
?>
<form action="<?php echo JRoute::_('index.php?option=com_books&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="book-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo empty($this->item->id) ? JText::_('COM_BOOKS_BOOK_ADD') : JText::sprintf('COM_BOOKS_BOOK_EDIT', $this->item->id); ?></legend>
			<ul class="adminformlist">
				<?php if ($this->item->id): ?>
					<li><?php echo $this->form->getLabel('id'); ?>
					<?php echo $this->form->getInput('id'); ?></li>
				<?php endif ?>

				<li><?php echo $this->form->getLabel('title'); ?>
				<?php echo $this->form->getInput('title'); ?></li>
				<li><?php echo $this->form->getLabel('alias'); ?>
				<?php echo $this->form->getInput('alias'); ?></li>
				<li><?php echo $this->form->getLabel('catid'); ?>
				<?php echo $this->form->getInput('catid'); ?></li>

				<li><?php echo $this->form->getLabel('author'); ?>
				<?php echo $this->form->getInput('author'); ?></li>
				<li><?php echo $this->form->getLabel('isbn'); ?>
				<?php echo $this->form->getInput('isbn'); ?></li>
				<li><?php echo $this->form->getLabel('pages'); ?>
				<?php echo $this->form->getInput('pages'); ?></li>
				<li><?php echo $this->form->getLabel('year'); ?>
				<?php echo $this->form->getInput('year'); ?></li>
				<li><?php echo $this->form->getLabel('editor'); ?>
				<?php echo $this->form->getInput('editor'); ?></li>
				<li><?php echo $this->form->getLabel('link'); ?>
				<?php echo $this->form->getInput('link'); ?></li>
				<li><?php echo $this->form->getLabel('image'); ?>
				<?php echo $this->form->getInput('image'); ?></li>

				<?php if ($canDo->get('core.edit.state')) : ?>
					<li><?php echo $this->form->getLabel('published'); ?>
					<?php echo $this->form->getInput('published'); ?></li>
				<?php endif; ?>

				<li><?php echo $this->form->getLabel('ordering'); ?>
				<?php echo $this->form->getInput('ordering'); ?></li>
			</ul>
			<div class="clr"></div>
			<?php echo $this->form->getLabel('description'); ?>
			<div class="clr"></div>
			<?php echo $this->form->getInput('description'); ?>
		</fieldset>
	</div>
	<div class="width-40 fltrt">
		<?php echo $this->loadTemplate('publish'); ?>
	</div>
	<div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	<div class="clr"></div>
</form>
