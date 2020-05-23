<?php 

	include 'DB.php';

	$app = DB::query('SELECT * FROM apps WHERE id=:id', array(':id' => $_GET['id']))[0];

	$appInfo = array(
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


	header('Content-Type: application/json');

	echo json_encode($appInfo, JSON_PRETTY_PRINT);
?>