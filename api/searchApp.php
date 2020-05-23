<?php 

	include 'DB.php';

	if (isset($_GET['category']) && !empty($_GET['category'])) {
		$apps = DB::query('SELECT * FROM apps WHERE category=:category', array(':category' => $_GET['category']));
	} else {
		$apps = DB::query('SELECT * FROM apps');
	}
	$appList = array();
	
	foreach ($apps as $app_key => $app) {
		$appList[] = array(
			"id" => $app['id'],
			"ipa" => $app['ipa'],
			"name" => $app['name'],
			"plistURL" => $app['plistURL'],
			"plistName" => $app['plistName'],
			"iconURL" => $app['iconURL'],
			"iconName" => $app['iconName'],
			"category" => $app['category'],
			"bundleID" => $app['bundleID'],
			"installMethod" => $app['installMethod'],
			"downloads" => $app['downloads'],
			"warning" => $app['warning'],
			"description" => $app['description'],
			"version" => $app['version'],
			"author" => $app['author'],
			"discordOk" => $app['discordOk'],
			"isAppStore" => $app['isAppStore'],
			"appstoreID" => $app['appstoreID'],
			"plainDescription" => $app['plainDescription'],
			"mdDescription" => $app['mdDescription'],
			"size" => $app['size'],
			"piracy" => $app['piracy'],
			"developerID" => $app['developerID'],
			"views" => $app['views'],
			"hidden" => $app['hidden']
		);
	}

	if (isset($_GET['random']) && !empty($_GET['random']) && $_GET['random'] == "true") {
		shuffle($appList);
	}

	header('Content-Type: application/json');

	echo json_encode($appList, JSON_PRETTY_PRINT);
?>