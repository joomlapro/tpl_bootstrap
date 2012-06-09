<?php
/**
 * @package		Bootstrap
 * @subpackage	tpl_bootstrap
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/*
 * welcome
 */
function modChrome_welcome($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="hero-unit<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
		<?php if ($module->showtitle != 0) : ?>
			<h1><?php echo $module->title; ?></h1>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}

/*
 * blocks
 */
function modChrome_blocks($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="span<?php echo $params->get('moduleclass_sfx') ? htmlspecialchars($params->get('moduleclass_sfx')) : '4'; ?>">
		<?php if ($module->showtitle != 0) : ?>
			<h2><?php echo $module->title; ?></h2>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}

/*
 * sidebar
 */
function modChrome_sidebar($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div<?php echo $params->get('moduleclass_sfx') ? ' class="' . htmlspecialchars($params->get('moduleclass_sfx')) . '"' : ''; ?>>
		<?php if ($module->showtitle != 0) : ?>
			<h2><?php echo $module->title; ?></h2>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}