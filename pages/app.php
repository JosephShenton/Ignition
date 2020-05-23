<?php 
  include 'Parsedown.php';
  include 'db.php';
  include 'itunesInfo.php';

  if (isset(DB::query('SELECT * FROM apps WHERE id=:id', array(':id' => $_GET['app']))[0]['name'])) {
    $appDB = DB::query('SELECT * FROM apps WHERE id=:id', array(':id' => $_GET['app']))[0];
    DB::query("UPDATE apps SET views=:views WHERE id=:id", array(":views" => $appDB['views'] + 1, ":id" => $_GET['app']));
  } else {
    $appDB['name'] = "App Not Found";
    $appDB['author'] = "App Not Found";
    $appDB['category'] = "App Not Found";
    $appDB['installMethod'] = "App Not Found";
    $appDB['mdDescription'] = "App Not Found";
  }

  if ($appDB['isAppStore'] == "YES") {
    $appiTunes = appInfo($appDB['appstoreID']);
    $appDB['name'] = $appiTunes['name'];
    $appDB['iconURL'] = $appiTunes['largeIcon'];
    $appDB['author'] = $appiTunes['developer'];
    $appDB['category'] = $appiTunes['category'];
    $appDB['mdDescription'] = $appiTunes['description'];
    $appDB['plainDescription'] = $appiTunes['description'];
    $appDB['description'] = $appiTunes['description'];
    $appDB['version'] = $appiTunes['version'];
  }

?>
<template>
  <div class="page" data-name="app">
    <div class="navbar">
      <div class="navbar-inner sliding">
        <div class="left">
          <a href="#" class="link back">
            <i class="icon icon-back"></i>
            <span class="ios-only">Back</span>
          </a>
        </div>
        <div class="title"><?php echo $appDB['name']; ?></div>
        <div class="right">
          <div class="chip" style="font-weight: 500;">
            <div class="chip-media bg-color-blue">
              <img src="img/Revokes.png" width="24px" height="24px" style="border-radius: 50%;">
            </div>
            <div class="chip-label status">Checking</div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content">
      <div class="list searchbar-found">
        <ul>
          <li class="item-content">
            <div class="item-media">
              <img src="<?php echo $appDB['iconURL']; ?>" class="lazy lazy-fade-in" width="60px" height="60px" style="border-radius: 23.37%;">
            </div>
            <div class="item-inner">
              <div class="item-title">
                <div class="item-header"><?php echo $appDB['author']; ?></div>
                <?php echo $appDB['name']; ?>
                <div class="item-footer"><?php echo ucfirst($appDB['category']); ?></div>
              </div>
              <div class="item-after">
                <span class="badge" style="width: 80px; height: 30px; line-height: 30px; background: #3E92CC;">
                  <a href="<?php echo $appDB['installMethod']; ?>" onclick="app.popup.open('#installPopup'); $$('.app-icon').attr('src', '<?php echo $appDB['iconURL']; ?>'); $$('.installingAppName').text('<?php echo htmlspecialchars($appDB['name']); ?>');" class="link external" style="color: white; font-weight: 600; font-size: 14px;">GET</a>
                </span>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <center>
        <br>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- UseIgnition Banner -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-2159753724070686"
             data-ad-slot="7296630504"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      </center>
      <div class="block-title">About <?php echo $appDB['name']; ?></div>
      <div class="block block-strong">
        <?php 
          $Parsedown = new Parsedown();

          if (empty($appDB['mdDescription'])) {
            if (empty($appDB['plainDescription'])) {
              if (empty($appDB['description'])) {
                echo $Parsedown->text('Description coming soon.');
              } else {
                echo $Parsedown->text($appDB['description']);
              }
            } else {
              echo $Parsedown->text($appDB['plainDescription']);
            }
          } else {
            echo $Parsedown->text($appDB['mdDescription']);
          }
        ?>
      </div>
      <div class="list">
        <ul>
          <li>
            <div class="item-content">
              <div class="item-inner">
                <div class="item-title">Version</div>
                <div class="item-after"><?php echo $appDB['version']; ?></div>
              </div>
            </div>
          </li>
          <li>
            <div class="item-content">
              <div class="item-inner">
                <div class="item-title">Developer</div>
                <div class="item-after"><?php echo $appDB['author']; ?></div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
  return {
    data: function () {
      var productId = this.$route.params.id;
      var currentProduct;
      this.$root.products.forEach(function (product) {
        if (product.id === productId) {
          currentProduct = product;
        }
      });
      return {
        product: currentProduct,
      };
    }
  };
</script>