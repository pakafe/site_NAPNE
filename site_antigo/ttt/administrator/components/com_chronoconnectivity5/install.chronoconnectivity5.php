<?php
/* @copyright:ChronoEngine.com @license:GPLv2 */defined('_JEXEC') or die('Restricted access');
class com_chronoconnectivity5InstallerScript {
	function postflight($type, $parent){
		$mainframe = JFactory::getApplication();
		$mainframe->redirect('index.php?option=com_chronoconnectivity5&cont=installer');
	}
}
?>