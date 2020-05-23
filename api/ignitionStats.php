<?php 
  
  include 'DB.php';

  $apps = DB::query('SELECT * FROM apps');

  function downloadCount() {
    global $apps;
    $downloads = 0;

    foreach ($apps as $app_key => $app) {
      $downloads = $downloads + $app['downloads'];
    }

    return $downloads;
  }

  function viewCount() {
    global $apps;
    $views = 0;

    foreach ($apps as $app_key => $app) {
      $views = $views + $app['views'];
    }

    return $views;
  }

  function appCount() {
    global $apps;
    return count($apps);
  }

  function loadApps() {
    global $apps;
    return $apps;
  }

  $info = array(
  	'downloads' => downloadCount(),
  	'views' => viewCount(),
  	'apps' => appCount()
  );

  header('Content-Type: application/json');
  echo json_encode($info, JSON_PRETTY_PRINT);

?>