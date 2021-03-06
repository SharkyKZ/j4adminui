<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_version
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<div class="joomlaversion d-flex">
	<div class="d-flex align-items-center mr-2">
		<span class="icon-joomla" aria-hidden="true"></span>
	</div>
	<div class="mx-auto">
		<span class="sr-only"><?php echo Text::sprintf('MOD_VERSION_CURRENT_VERSION_TEXT', $version); ?></span>
		<span aria-hidden="true"><?php echo $version; ?></span>
	</div>
</div>
