<?php
/**
 * @package     Bootstrap
 * @subpackage  tpl_bootstrap
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Create the html for a list footer
 *
 * @param   array  $list  Pagination list data structure.
 *
 * @return  string  HTML for a list start, previous, next,end
 *
 * @since   11.1
 */
function pagination_list_render($list)
{
	// Reverse output rendering for right-to-left display.
	$html = '<ul>';
	$html .= $list['start']['data'];
	$html .= $list['previous']['data'];
	foreach ($list['pages'] as $page)
	{
		$html .= $page['data'];
	}
	$html .= $list['next']['data'];
	$html .= $list['end']['data'];
	$html .= '</ul>';

	return $html;
}

/**
 * Method to create an active pagination link to the item
 *
 * @param   JPaginationObject  &$item  The object with which to make an active link.
 *
 * @return   string  HTML link
 *
 * @since    11.1
 */
function pagination_item_active(&$item)
{
	$app = JFactory::getApplication();
	if ($app->isAdmin())
	{
		if ($item->base > 0)
		{
			return "<li><a title=\"" . $item->text . "\" onclick=\"document.adminForm." . $this->prefix . "limitstart.value=" . $item->base
				. "; Joomla.submitform();return false;\">" . $item->text . "</a>";
		}
		else
		{
			return "<li><a title=\"" . $item->text . "\" onclick=\"document.adminForm." . $this->prefix
				. "limitstart.value=0; Joomla.submitform();return false;\">" . $item->text . "</a></li>";
		}
	}
	else
	{
		return "<li><a title=\"" . $item->text . "\" href=\"" . $item->link . "\" class=\"pagenav\">" . $item->text . "</a></li>";
	}
}


/**
 * Method to create an inactive pagination string
 *
 * @param   object  &$item  The item to be processed
 *
 * @return  string
 *
 * @since   11.1
 */
function pagination_item_inactive(&$item)
{
	$app = JFactory::getApplication();
	if ($app->isAdmin())
	{
		return "<span>" . $item->text . "</span>";
	}
	else
	{
		return "<li class=\"active\"><a href=\"#\">" . $item->text . "</a></li>";
	}
}
