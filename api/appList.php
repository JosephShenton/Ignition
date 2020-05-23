<?php 

	include 'DB.php';

	$apps = DB::query('SELECT * FROM request');

	$apps_list = "";

	$appCount = count($apps);

	foreach ($apps as $app_key => $app) {
		if ($app_key == $appCount - 1) {
			$apps_list .= $app['app_id'];
		} else {
			$apps_list .= $app['app_id']."\n";
		}
	}

	header('Content-Type: text/plain');

	echo $apps_list;
?>