<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$lang = JFactory::getLanguage();
$app  = JFactory::getApplication();

if ($params->get('opensearch', 1)) {
	$doc = JFactory::getDocument();

	$ostitle = $params->get('opensearch_title', JText::_('MOD_SEARCH_SEARCHBUTTON_TEXT').' '.$app->getCfg('sitename'));
	$doc->addHeadLink(JURI::getInstance()->toString(array('scheme', 'host', 'port')).JRoute::_('&option=com_search&format=opensearch'), 'search', 'rel', array('title' => htmlspecialchars($ostitle), 'type' => 'application/opensearchdescription+xml'));
}

$upper_limit = $lang->getUpperLimitSearchWord();

$button			= $params->get('button', '');
$imagebutton	= $params->get('imagebutton', '');
$button_pos		= $params->get('button_pos', 'left');
$button_text	= htmlspecialchars($params->get('button_text', JText::_('MOD_SEARCH_SEARCHBUTTON_TEXT')));
$width			= intval($params->get('width', 20));
$maxlength		= $upper_limit;
$text			= htmlspecialchars($params->get('text', JText::_('MOD_SEARCH_SEARCHBOX_TEXT')));
$label			= htmlspecialchars($params->get('label', JText::_('MOD_SEARCH_LABEL_TEXT')));
$set_Itemid		= intval($params->get('set_itemid', 0));
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

if ($imagebutton) {
	$img = modSearchHelper::getSearchImage($button_text);
}
$mitemid = $set_Itemid > 0 ? $set_Itemid : $app->input->get('Itemid');
require JModuleHelper::getLayoutPath('mod_search', $params->get('layout', 'default'));
