<?php
/**
* COMPONENT FILE HEADER
**/
namespace GCore\Admin\Extensions\Chronoconnectivity;
/* @copyright:ChronoEngine.com @license:GPLv2 */defined('_JEXEC') or die('Restricted access');
defined("GCORE_SITE") or die;
class Chronoconnectivity extends \GCore\Libs\GController {
	var $models = array('\GCore\Admin\Extensions\Chronoconnectivity\Models\Connection', '\GCore\Admin\Models\Group');
	var $libs = array('\GCore\Libs\Request');
	var $helpers= array(
		'\GCore\Helpers\DataTable', 
		'\GCore\Helpers\Assets', 
		'\GCore\Helpers\Html', 
		'\GCore\Helpers\Toolbar', 
		'\GCore\Helpers\Tasks', 
		'\GCore\Helpers\Paginator', 
		'\GCore\Helpers\Sorter'
	);
	
	function index(){
		$this->_sortable();
		$this->_paginate();
		$connections = $this->Connection->find('all');
		$this->set('connections', $connections);
		if($this->_validated() === false){
			$session = \GCore\Libs\Base::getSession();
			$domain = str_replace(array('http://', 'https://'), '', \GCore\Libs\Url::domain());
			$session->setFlash('error', "Your ChronoConnectivity installation on <strong>".$domain."</strong> is NOT validated.");
		}
	}
	
	function toggle(){
		parent::_toggle();
		$this->redirect(r_('index.php?ext=chronoconnectivity'));
	}
	
	//data reading
	function edit(){
		$id = $this->Request->data('id', null);
		$this->Connection->id = $id;
		$connection = $this->Connection->load();
		if(!empty($connection)){
			$this->data = $connection;
		}
		$this->set(array('connection' => $connection));
		
		$tables = $this->Connection->dbo->getTablesList();
		array_unshift($tables, '');
		$this->set('tables', array_combine($tables, $tables));
		
		$blocks_files = \GCore\Libs\Folder::getFiles(\GCore\C::ext_path('chronoconnectivity', 'admin').'blocks'.DS);
		$blocks = array();
		$blocks_classes = array();
		foreach($blocks_files as $block){
			$name = str_replace(array(\GCore\C::ext_path('chronoconnectivity', 'admin').'blocks'.DS, '.php'), '', $block);
			$blocks_classes[] = $class = '\GCore\Admin\Extensions\Chronoconnectivity\Blocks\\'.\GCore\Libs\Str::camilize($name);
			$blocks[$class::$name] = $class::$title;
		}
		$this->set('blocks', $blocks);
		$this->set('blocks_classes', $blocks_classes);
		
		$rules = $this->Group->find('list', array('fields' => array('id', 'title')));
		$rules['owner'] = 'Owner';
		$this->set('rules', $rules);
		
		$actions_list = array('index', 'view', 'edit', 'save', 'save_list', 'toggle', 'delete');
		$standard_actions = array('view', 'edit');
		foreach($standard_actions as $standard_action){
			if(!isset($this->data['Connection']['extras']['front']['actions'][$standard_action])){
				$this->data['Connection']['extras']['front']['actions'][$standard_action] = array();
			}
			if(!isset($this->data['Connection']['extras']['admin']['actions'][$standard_action])){
				$this->data['Connection']['extras']['admin']['actions'][$standard_action] = array();
			}
		}
		
		$this->set('actions_list', $actions_list);
		$this->set('standard_actions', $standard_actions);
		
		$plugins_files = \GCore\Libs\Folder::getFiles(\GCore\C::ext_path('chronoconnectivity', 'admin').'plugins'.DS);
		$plugins = array();
		$plugins_classes = array();
		foreach($plugins_files as $plugin){
			$name = str_replace(array(\GCore\C::ext_path('chronoconnectivity', 'admin').'plugins'.DS, '.php'), '', $plugin);
			$plugins_classes[] = $class = '\GCore\Admin\Extensions\Chronoconnectivity\Plugins\\'.\GCore\Libs\Str::camilize($name).'\\'.\GCore\Libs\Str::camilize($name);
			$plugins[$class::$name] = $class::$title;
		}
		$this->set('plugins', $plugins);
		$this->set('plugins_classes', $plugins_classes);
	}
	
	function save(){
		$result = parent::_save();
		if($result){
			if($this->Request->get('save_act') == 'apply'){
				$this->redirect(r_('index.php?ext=chronoconnectivity&act=edit&id='.$this->Connection->id));
			}else{
				$this->redirect(r_('index.php?ext=chronoconnectivity'));
			}
		}else{
			$this->edit();
			$this->view = 'edit';
			$session = \GCore\Libs\Base::getSession();
			$session->setFlash('error', \GCore\Libs\Arr::flatten($this->Connection->errors));
		}
	}
	
	function save_list(){
		parent::_save_list();
		$this->redirect(r_('index.php?ext=chronoconnectivity'));
	}
	
	function delete(){
		parent::_delete();
		$this->redirect(r_('index.php?ext=chronoconnectivity'));
	}
	
	function delete_cache(){
		$path = \GCore\C::get('GCORE_FRONT_PATH').'cache'.DS;
		$files = \GCore\Libs\Folder::getFiles($path);
		$count = 0;
		foreach($files as $k => $file){
			if(basename($file) != 'index.html'){
				$result = \GCore\Libs\File::delete($file);
				if($result){
					$count++;
				}
			}
		}
		$session = \GCore\Libs\Base::getSession();
		$session->setFlash('info', $count.' '.l_('CACHE_FILES_DELETED'));
		$this->redirect(r_('index.php?ext=chronoconnectivity'));
	}
	
	function copy(){
		$session = \GCore\Libs\Base::getSession();
		if(empty($this->data['gcb'])){
			$session->setFlash('error', l_('CONN_NO_CONNECTIONS_SELECTED'));
			$this->redirect(r_('index.php?ext=chronoconnectivity'));
		}
		$connections = $this->Connection->find('all', array('conditions' => array('id' => $this->data['gcb'])));
		if(!empty($connections)){
			foreach($connections as $connection){
				if(isset($connection['Connection']['id'])){
					$connection['Connection']['id'] = null;
					//$connection['Connection']['published'] = 0;
					$this->Connection->save($connection);
				}
			}
		}
		$session->setFlash('success', l_('CONN_CONNECTIONS_COPIED'));
		$this->redirect(r_('index.php?ext=chronoconnectivity'));
	}
	
	function backup(){
		if(empty($this->data['gcb'])){
			$session = \GCore\Libs\Base::getSession();
			$session->setFlash('error', l_('CONN_NO_CONNECTIONS_SELECTED'));
			$this->redirect(r_('index.php?ext=chronoconnectivity'));
		}
		$connections = $this->Connection->find('all', array('conditions' => array('id' => $this->data['gcb'])));
		$output = base64_encode(serialize($connections));
		
		//download the file
		if(ereg('Opera(/| )([0-9].[0-9]{1,2})', $_SERVER['HTTP_USER_AGENT'])){
			$UserBrowser = 'Opera';
		}elseif(ereg('MSIE ([0-9].[0-9]{1,2})', $_SERVER['HTTP_USER_AGENT'])){
			$UserBrowser = 'IE';
		}else{
			$UserBrowser = '';
		}
		$mime_type = ($UserBrowser == 'IE' || $UserBrowser == 'Opera') ? 'application/octetstream' : 'application/octet-stream';
		@ob_end_clean();
		ob_start();
	
		header('Content-Type: ' . $mime_type);
		header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	
		if ($UserBrowser == 'IE') {
			header('Content-Disposition: inline; filename="' . 'CCV5_Backup_ON_'.\GCore\Libs\Url::domain().'_'.date('d_M_Y_H:i:s').'.cc5bak"');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
		}
		else {
			header('Content-Disposition: attachment; filename="' . 'CCV5_Backup_ON_'.\GCore\Libs\Url::domain().'_'.date('d_M_Y_H:i:s').'.cc5bak"');
			header('Pragma: no-cache');
		}
		print $output;
		exit();
	}
	
	function restore(){
		$files = $_FILES;
		if(is_array($files) AND !empty($files)){
			$session = \GCore\Libs\Base::getSession();
			
			if(!\GCore\Libs\Upload::valid($files['ccbackup'])){
				$session->setFlash('error', l_('CONN_CONNECTIONS_RESTORE_ERROR'));
				return false;
			}
			if(!\GCore\Libs\Upload::not_empty($files['ccbackup'])){
				$session->setFlash('error', l_('CONN_CONNECTIONS_RESTORE_ERROR'));
				return false;
			}
			if(!\GCore\Libs\Upload::check_type($files['ccbackup'], array('cc5bak'))){
				$session->setFlash('error', l_('CONN_CONNECTIONS_RESTORE_ERROR'));
				return false;
			}
			
			$path = \GCore\C::get('GCORE_FRONT_PATH').DS.'cache';
			$uploaded_file = \GCore\Libs\Upload::save($files['ccbackup']['tmp_name'], $path.DS.$files['ccbackup']['name']);
			
			if(!$uploaded_file){
				$session->setFlash('error', l_('CONN_CONNECTIONS_RESTORE_ERROR'));
			}else{
				$data = file_get_contents($path.DS.$files['ccbackup']['name']);
				\GCore\Libs\File::delete($path.DS.$files['ccbackup']['name']);
				$connections = unserialize(base64_decode(trim($data)));
				if(!empty($connections)){
					foreach($connections as $connection){
						if(isset($connection['Connection']['id'])){
							$connection['Connection']['id'] = null;
							$connection['Connection']['published'] = 0;
							$this->Connection->save($connection);
						}
					}
				}
				$session->setFlash('success', l_('CONN_CONNECTIONS_RESTORED'));
				$this->redirect(r_('index.php?ext=chronoconnectivity'));
			}
		}
	}
		
	function _validated(){
		parent::_settings('chronoconnectivity');
		if(isset($this->data['Chronoconnectivity']['validated']) AND (int)$this->data['Chronoconnectivity']['validated'] == 1){
			return true;
		}
		return false;
	}
	
	function settings(){
		parent::_settings('chronoconnectivity');
	}
	
	function save_settings(){
		$result = parent::_save_settings('chronoconnectivity');
		$session = \GCore\Libs\Base::getSession();
		if($result){
			$session->setFlash('success', l_('SAVE_SUCCESS'));
		}else{
			$session->setFlash('error', l_('SAVE_ERROR'));
		}
		$this->redirect(r_('index.php?ext=chronoconnectivity&act=settings'));
	}
	
	function validateinstall(){
		$domain = str_replace(array('http://', 'https://'), '', \GCore\Libs\Url::domain());
		$this->set('domain', $domain);
		if(!empty($this->data['license_key'])){
			$session = \GCore\Libs\Base::getSession();
			$fields = '';
			//$postfields = array();
			unset($this->data['option']);
			unset($this->data['act']);
			foreach($this->data as $key => $value){
				$fields .= "$key=".urlencode($value)."&";
			}
			
			$target_url = 'http://www.chronoengine.com/index.php?option=com_chronocontact&task=extra&chronoformname=validateLicense';
			if(ini_get('allow_url_open')){
				$output = file_get_contents($target_url.'&'.rtrim($fields, "& "));
			}else{
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $target_url);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($fields, "& "));
				$output = curl_exec($ch);
				curl_close($ch);
			}
			$validstatus = $output;
			
			if($validstatus == 'valid'){
				parent::_settings('chronoconnectivity');
				$this->data['Chronoconnectivity']['validated'] = 1;
				$result = parent::_save_settings('chronoconnectivity');
				if($result){
					$session->setFlash('success', 'Validated successflly.');
					$this->redirect(r_('index.php?ext=chronoconnectivity'));
				}else{
					$session->setFlash('error', 'Validation error.');
				}
			}else if($validstatus == 'invalid'){
				parent::_settings('chronoconnectivity');
				$this->data['Chronoconnectivity']['validated'] = 0;
				$result = parent::_save_settings('chronoconnectivity');
				$session->setFlash('error', 'Validation error, you have provided incorrect data.');
				$this->redirect(r_('index.php?ext=chronoconnectivity'));
			}else{
				if(!empty($this->data['instantcode'])){
					$step1 = base64_decode(trim($this->data['instantcode']));
					$step2 = str_replace(substr(md5(str_replace('www.', '', strtolower($matches[2]))), 0, 7), '', $step1);
					$step3 = str_replace(substr(md5(str_replace('www.', '', strtolower($matches[2]))), - strlen(md5(str_replace('www.', '', strtolower($matches[2])))) + 7), '', $step2);
					$step4 = str_replace(substr($this->data['license_key'], 0, 10), '', $step3);
					$step5 = str_replace(substr($this->data['license_key'], - strlen($this->data['license_key']) + 10), '', $step4);
					//echo (int)$step5;return;
					//if((((int)$step5 + (24 * 60 * 60)) > strtotime(date('d-m-Y H:i:s')))||(((int)$step5 - (24 * 60 * 60)) < strtotime(date('d-m-Y H:i:s')))){
					if(((int)$step5 < (strtotime("now") + (24 * 60 * 60))) AND ((int)$step5 > (strtotime("now") - (24 * 60 * 60)))){
						parent::_settings('chronoconnectivity');
						$this->data['Chronoconnectivity']['validated'] = 1;
						$result = parent::_save_settings('chronoconnectivity');
						if($result){
							$session->setFlash('success', 'Validated successflly.');
							$this->redirect(r_('index.php?ext=chronoconnectivity'));
						}else{
							$session->setFlash('error', 'Validation error.');
						}
					}else{
						$session->setFlash('error', 'Validation error, Invalid instant code provided.');
						$this->redirect(r_('index.php?ext=chronoconnectivity'));
					}
				}else{
					$session->setFlash('error', 'Validation error, your server does NOT have the CURL function enabled, please ask your host admin to enable the CURL, or please try again using the Instant Code, or please contact us on www.chronoengine.com');
					$this->redirect(r_('index.php?ext=chronoconnectivity'));
				}
			}
		}
	}
}
?>