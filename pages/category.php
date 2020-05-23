<?php 
  include 'db.php';
  function loadApps() {
    if (isset($_GET['category']) && $_GET['category'] == "All Apps") {
      $apps = DB::query('SELECT * FROM apps');
      $apps2 = array();
      foreach ($apps as $app_key => $app) {
        if ($app['id'] == "1361" || $app['id'] == "86") {
          array_unshift($apps2, $app);
        } else {
          $apps2[] = $app;
        }
      }
      $apps = $apps2;
      $apps2 = NULL;
    } else {
      $apps = DB::query('SELECT * FROM apps WHERE category=:cat', array(':cat' => $_GET['category']));
      $apps2 = array();
      foreach ($apps as $app_key => $app) {
        if ($app['id'] == "1361" || $app['id'] == "86") {
          array_unshift($apps2, $app);
        } else {
          $apps2[] = $app;
        }
      }
      $apps = $apps2;
      $apps2 = NULL;
    }

    // shuffle($apps);

    return $apps;
  }

  function shorten($string) {
    if (strlen($string) >= 20) {
        echo substr($string, 0, 10). " ... " . substr($string, -5);
    }
    else {
        echo $string;
    }
  }
?>
<template>
  <div class="page category" data-name="view-category">
    <div class="navbar">
      <div class="navbar-inner sliding">
        <div class="left">
          <a href="#" class="link back">
            <i class="icon icon-back"></i>
            <span class="ios-only">Back</span>
          </a>
        </div>
        <div class="title sliding"><?php echo ucfirst($_GET['category']); ?></div>
        <div class="right">
          <div class="chip" style="font-weight: 500;">
            <div class="chip-media bg-color-blue">
              <img src="img/Revokes.png" width="24px" height="24px" style="border-radius: 50%;">
            </div>
            <div class="chip-label status">Checking</div>
          </div>
        </div>
        <div class="subnavbar">
          <form class="searchbar catSearch">
            <div class="searchbar-inner">
              <div class="searchbar-input-wrap">
                <input type="search" placeholder="Search">
                <i class="searchbar-icon"></i>
                <span class="input-clear-button"></span>
              </div>
              <span class="searchbar-disable-button">Cancel</span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="page-content">
      <div class="searchbar-backdrop"></div>
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
      <div class="list searchbar-found">
        <ul>
          <?php foreach (loadApps() as $app_key => $app): ?>
            <li>
              <a href="/app/<?php echo $app['id']; ?>/" class="item-link item-content">
                <div class="item-media"><img src="<?php echo $app['iconURL']; ?>" class="lazy lazy-fade-in" width="42px" height="42px" style="border-radius: 10px;"></div>
                <div class="item-inner">
                  <div class="item-title">
                    <div class="item-header"><?php echo $app['author']; ?></div>
                    <?php echo $app['name']; ?>
                    <div class="item-footer"><?php echo ucfirst($app['category']); ?></div>
                  </div>
                  <div class="item-after">
                    <?php if (new DateTime($app['revoke_date']) > new DateTime($app['resign_date'])): ?>
                      <div class="chip color-red">
                        <div class="chip-label">Revoked</div>
                      </div>
                    <?php else: ?>
                      <div class="chip color-green">
                        <div class="chip-label">Signed</div>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
      <!-- Nothing found message -->
      <div class="block searchbar-not-found">
        <div class="block-inner">
          <p>No apps found matching your search criteria. Please try a different search or come back later.</p>
        </div>
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