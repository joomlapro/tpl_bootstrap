<?php
/**
 * @package    Bootstrap
 * @subpackage  tpl_bootstrap
 * @copyright  Copyright (C) AtomTech, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// define variables
$path = $this->baseurl . '/templates/' . $this->template;
$app = JFactory::getApplication();
$frontend = JRequest::getVar('view') == 'featured';

JHtml::script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language ?>" dir="<?php echo $this->direction ?>">
	<head>
		<jdoc:include type="head" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo $path ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo $path ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="<?php echo $path ?>/css/template.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php $path ?>/images/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php $path ?>/images/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php $path ?>/images/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php $path ?>/images/apple-touch-icon-57-precomposed.png">
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="<?php echo $this->baseurl ?>"><?php echo $app->getCfg('sitename'); ?></a>
					<div class="btn-group pull-right">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user"></i> <?php echo JText::_('TPL_BOOTSTRAP_PANEL'); ?>
							<span class="caret"></span>
						</a>
						<jdoc:include type="modules" name="bootstrap-login" style="none" />
					</div>
					<div class="nav-collapse">
						<jdoc:include type="modules" name="bootstrap-mainmenu" style="none" />
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="span3">
					<jdoc:include type="modules" name="bootstrap-sidebar" style="sidebar" />
				</div>
				<div class="span9">
					<?php if ($frontend): ?>
					<jdoc:include type="modules" name="bootstrap-welcome" style="welcome" />
					<div class="row">
						<jdoc:include type="modules" name="bootstrap-blocks" style="blocks" />
					</div>
					<?php else: ?>
					<?php
					$messages = $app->getMessageQueue();
					
					if (count($messages)) {
						foreach ($messages as $message) {
							$html = '<div class="alert alert-' . strtolower($message['type']) . '">';
							$html .= '<button data-dismiss="alert" class="close">×</button>';
							$html .= '<strong>' . JText::_('TPL_BOOTSTRAP_MESSAGE_' . strtoupper($message['type'])) . '!</strong> ' . $message['message'];
							$html .= '</div>';
							
							echo $html;
						}
					}
					?>
					<jdoc:include type="component" />
					<?php endif ?>
				</div>
			</div>
			<hr>
			<footer>
				<p>&copy; <?php echo date('Y') ?> <?php echo $app->getCfg('sitename'); ?></p>
			</footer>
		</div>
		<script src="<?php echo $path ?>/js/bootstrap.min.js"></script>
		<script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-31130630-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s)})();</script>
	</body>
</html>
