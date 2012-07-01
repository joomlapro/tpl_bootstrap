<?php
/**
 * @package     Bootstrap
 * @subpackage  tpl_bootstrap
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Define variables
$path = $this->baseurl . '/templates/' . $this->template;
?>
<!DOCTYPE HTML>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link href="<?php echo $path ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $path ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $path ?>/css/template.css">
</head>
<body class="contentpane">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>