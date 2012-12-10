<?php
/**
 * @package		Books
 * @subpackage	com_books
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die();
?>
<div class="book-list">
	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>

	<?php foreach ($this->items as $item): ?>
	<div class="row">
		<div class="span2" style="text-align: center;">
			<a href="<?php echo $item->link ?>" target="_blank">
				<?php if ($item->image) : ?>
				<img src="<?php echo $item->image; ?>" class="photo" />
				<?php else : ?>
				<img src="<?php echo JURI::root();?>media/com_books/images/noimage.jpg" alt="" class="photo" />
				<?php endif; ?>
			</a>
			<div class="editor">
				<?php echo JText::_('COM_BOOKS_SEE_BOOK'); ?> <a href="<?php echo $item->link ?>" target="_blank"><strong><?php echo $item->editor ?></strong></a>
			</div>
		</div>

		<div class="span6">
			<h6><?php echo $item->category_title; ?></h6>
			<h2><?php echo $item->title; ?></h2>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="title"><?php echo JText::_('COM_BOOKS_HEADING_NAME'); ?></th>
						<th><?php echo JText::_('COM_BOOKS_HEADING_DESCRIPTION'); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th><?php echo JText::_('COM_BOOKS_HEADING_AUTHOR'); ?></th>
						<td><?php echo $item->author ?></td>
					</tr>
					<tr>
						<th><?php echo JText::_('COM_BOOKS_HEADING_ISBN'); ?></th>
						<td><?php echo $item->isbn ?></td>
					</tr>
					<tr>
						<th><?php echo JText::_('COM_BOOKS_HEADING_PAGES'); ?></th>
						<td><?php echo $item->pages ?></td>
					</tr>
					<tr>
						<th><?php echo JText::_('COM_BOOKS_HEADING_YEAR'); ?></th>
						<td><?php echo $item->year ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<hr>
	<?php endforeach ?>
</div>