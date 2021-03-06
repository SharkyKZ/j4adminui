<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\CMS\Language\Text;

?>

<fieldset class="<?php echo !empty($displayData->formclass) ? $displayData->formclass : 'form-horizontal'; ?>">
	<div class="j-card no-boxshadow">
		<div class="j-card-header"><?php echo $displayData->name; ?></div>
	</div>
	<details class="j-card">
		<summary class="filter-notes j-card-header"><?php echo Text::_('COM_CONFIG_TEXT_FILTERS_SUMMARY'); ?></summary>
		<div class="filter-notes"><?php echo Text::_('COM_CONFIG_TEXT_FILTERS_DESC'); ?></div>
	</details>
	<details class="j-card">
		<summary class="filter-notes j-card-header"><?php echo Text::_('JGLOBAL_FILTER_TYPE_LABEL'); ?></summary>
		<div class="filter-notes"><?php echo Text::_('JGLOBAL_FILTER_TYPE_DESC'); ?></div>
	</details>
	<details class="j-card">
		<summary class="filter-notes j-card-header"><?php echo Text::_('JGLOBAL_FILTER_TAGS_LABEL'); ?></summary>
		<div class="filter-notes"><?php echo Text::_('JGLOBAL_FILTER_TAGS_DESC'); ?></div>
	</details>
	<details class="j-card">
		<summary class="filter-notes j-card-header"><?php echo Text::_('JGLOBAL_FILTER_ATTRIBUTES_LABEL'); ?></summary>
		<div class="filter-notes"><?php echo Text::_('JGLOBAL_FILTER_ATTRIBUTES_DESC'); ?></div>
	</details>
	<div class="j-card p-4">
		<?php $fieldsnames = explode(',', $displayData->fieldsname); ?>
		<?php foreach ($fieldsnames as $fieldname) : ?>
			<?php foreach ($displayData->form->getFieldset($fieldname) as $field) : ?>
				<div><?php echo $field->input; ?></div>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
</fieldset>
