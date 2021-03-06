<?php
/***************************************************************************
 *   copyright				: (C) 2008 - 2016 WeBid
 *   site					: http://www.webidsupport.com/
 ***************************************************************************/

/***************************************************************************
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version. Although none of the code may be
 *   sold. If you have been sold this script, get a refund.
 ***************************************************************************/

define('InAdmin', 1);
$current_page = 'contents';
include '../common.php';
include $include_path . 'functions_admin.php';
include 'loggedin.inc.php';

if (isset($_POST['action']) && $_POST['action'] == 'update')
{
	// clean submission and update database
	$system->writesetting("boards",ynbool($_POST['boards']),"str");
	$ERR = $MSG['5051'];
}

loadblock($MSG['5048'], '', 'yesno', 'boards', $system->SETTINGS['boards'], array($MSG['030'], $MSG['029']));

$template->assign_vars(array(
		'ERROR' => (isset($ERR)) ? $ERR : '',
		'SITEURL' => $system->SETTINGS['siteurl'],
		'TYPENAME' => $MSG['25_0018'],
		'PAGENAME' => $MSG['5047']
		));

$template->set_filenames(array(
		'body' => 'adminpages.tpl'
		));
$template->display('body');
?>