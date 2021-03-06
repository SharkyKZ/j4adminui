<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_associations
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Associations\Administrator\Field\Modal;

defined('JPATH_BASE') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Session\Session;

/**
 * Supports a modal item picker.
 *
 * @since  3.7.0
 */
class AssociationField extends FormField
{
	/**
	 * The form field type.
	 *
	 * @var     string
	 * @since   3.7.0
	 */
	protected $type = 'Modal_Association';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   3.7.0
	 */
	protected function getInput()
	{
		// @TODO USE JLayouts here!!!
		// The active item id field.
		$value = (int) $this->value > 0 ? (int) $this->value : '';

		Factory::getDocument()->addScriptOptions('modal-associations', ['itemId' => $value]);
		HTMLHelper::_('script', 'com_associations/modal-associations.min.js', ['version' => 'auto', 'relative' => true]);

		// Setup variables for display.
		$html = array();

		$linkAssociations = 'index.php?option=com_associations&amp;view=associations&amp;layout=modal&amp;tmpl=component'
			. '&amp;forcedItemType=' . Factory::getApplication()->input->get('itemtype', '', 'string') . '&amp;function=jSelectAssociation_' . $this->id;

		$linkAssociations .= "&amp;forcedLanguage=' + document.getElementById('target-association').getAttribute('data-language') + '";

		$urlSelect = $linkAssociations . '&amp;' . Session::getFormToken() . '=1';

		// Select custom association button
		$html[] = '<button'
			. ' type="button"'
			. ' id="select-change"'
			. ' class="btn btn-secondary' . ($value ? '' : ' hidden') . '"'
			. ' data-toggle="modal"'
			. ' data-select="' . Text::_('COM_ASSOCIATIONS_SELECT_TARGET') . '"'
			. ' data-change="' . Text::_('COM_ASSOCIATIONS_CHANGE_TARGET') . '"'
			. ' data-href="#associationSelect' . $this->id . 'Modal">'
			. '<span class="icon-file" aria-hidden="true"></span> '
			. '<span id="select-change-text"></span>'
			. '</button>';

		// Clear association button
		$html[] = '<button'
			. ' type="button"'
			. ' class="btn btn-secondary' . ($value ? '' : ' hidden') . '"'
			. ' onclick="return Joomla.submitbutton(\'undo-association\');"'
			. ' id="remove-assoc">'
			. '<span class="icon-remove" aria-hidden="true"></span> ' . Text::_('JCLEAR')
			. '</button>';

		$html[] = '<input type="hidden" id="' . $this->id . '_id" name="' . $this->name . '" value="' . $value . '">';

		// Select custom association modal
		$html[] = HTMLHelper::_(
			'webcomponent.renderModal',
			'associationSelect' . $this->id . 'Modal',
			array(
				'title'       => Text::_('COM_ASSOCIATIONS_SELECT_TARGET'),
				'backdrop'    => 'static',
				'url'         => $urlSelect,
				'height'      => '75vh',
				'width'       => '85vw',
				'bodyHeight'  => 70,
				'modalWidth'  => 80,
				'footer'      => '<button type="button" class="btn btn-secondary" data-dismiss="modal">'
						. Text::_("JLIB_HTML_BEHAVIOR_CLOSE") . '</button>',
			)
		);

		return implode("\n", $html);
	}
}
