<?php 
	include 'itunes.php';
	function appInfo($id) {
		$app = iTunes::lookup($id, 'id')['results'];
		$app = $app[0];
		// print_r($app);
		$iPhoneScreenshots = $app['screenshotUrls'];
		$iPadScreenshots = $app['ipadScreenshotUrls'];
		$appleTVScreenshots = $app['appletvScreenshotUrls'];
		$smallIcon = $app['artworkUrl60'];
		$mediumIcon = $app['artworkUrl100'];
		$largeIcon = $app['artworkUrl512'];
		$developerURL = $app['artistViewUrl'];
		$description = $app['description'];
		$version = $app['version'];
		$developer = $app['sellerName'];
		$name = $app['trackName'];
		$category = $app['primaryGenreName'];
		$appInfo = array();
		$appInfo['iPhoneScreenshots'] = $iPhoneScreenshots;
		$appInfo['iPadScreenshots'] = $iPadScreenshots;
		$appInfo['appleTVScreenshots'] = $appleTVScreenshots;
		$appInfo['smallIcon'] = $smallIcon;
		$appInfo['mediumIcon'] = $mediumIcon;
		$appInfo['largeIcon'] = $largeIcon;
		$appInfo['developerURL'] = $developerURL;
		$appInfo['description'] = $description;
		$appInfo['version'] = $version;
		$appInfo['developer'] = $developer;
		$appInfo['name'] = $name;
		$appInfo['category'] = $category;
		return $appInfo;
	}
// <pre><?php print_r(appInfo("733242567")); ?/></pre>
?>