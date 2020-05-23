routes = [
  {
    path: '/',
    url: './index.html',
  },
  {
    path: '/about/',
    url: './pages/about.html',
  },
  {
    path: '/legal/',
    url: './pages/legal.html',
  },
  {
    path: '/catalog/',
    componentUrl: './pages/catalog.html',
  },
  {
    path: '/news/',
    url: './pages/news.html',
  },
  {
    path: '/theming/',
    componentUrl: './pages/theming.html',
  },
  // {
  //   path: '/exoresign/',
  //   url: './pages/exoresign.php',
  // },
  {
    path: '/revokes/',
    url: './pages/revokes.html',
  },
  {
    path: '/updates/',
    url: './pages/updates.html',
  },
  {
    path: '/category/:category/',
    // componentUrl: './pages/app.php?app={{this.$route.params.id}}',
    async(routeTo, routeFrom, resolve, reject) {
      var url = './pages/category.php?category='+routeTo.params.category;
      // var stringData = routeTo.query;
      // if (stringData.length) {
      //   url = url + "?" + stringData;
      // }
      resolve({ componentUrl: url });
    }
  },
  {
    path: '/app/:id/',
    // componentUrl: './pages/app.php?app={{this.$route.params.id}}',
    async(routeTo, routeFrom, resolve, reject) {
      var url = './pages/app.php?app='+routeTo.params.id;
      // var stringData = routeTo.query;
      // if (stringData.length) {
      //   url = url + "?" + stringData;
      // }
      resolve({ componentUrl: url });
    }
  },
  {
    path: '/exo/:id/',
    // componentUrl: './pages/app.php?app={{this.$route.params.id}}',
    async(routeTo, routeFrom, resolve, reject) {
      var url = './pages/exo.php?app='+routeTo.params.id;
      // var stringData = routeTo.query;
      // if (stringData.length) {
      //   url = url + "?" + stringData;
      // }
      resolve({ componentUrl: url });
    }
  },
  {
    path: '/search/',
    url: './pages/search.php',
  },
  // Page Loaders & Router
  {
    path: '/page-loader-template7/:user/:userId/:posts/:postId/',
    templateUrl: './pages/page-loader-template7.html',
  },
  {
    path: '/page-loader-component/:user/:userId/:posts/:postId/',
    componentUrl: './pages/page-loader-component.html',
  },
  {
    path: '/request-and-load/user/:userId/',
    async: function (routeTo, routeFrom, resolve, reject) {
      // Router instance
      var router = this;

      // App instance
      var app = router.app;

      // Show Preloader
      app.preloader.show();

      // User ID from request
      var userId = routeTo.params.userId;

      // Simulate Ajax Request
      setTimeout(function () {
        // We got user data from request
        var user = {
          firstName: 'Vladimir',
          lastName: 'Kharlampidi',
          about: 'Hello, i am creator of Framework7! Hope you like it!',
          links: [
            {
              title: 'Framework7 Website',
              url: 'http://framework7.io',
            },
            {
              title: 'Framework7 Forum',
              url: 'http://forum.framework7.io',
            },
          ]
        };
        // Hide Preloader
        app.preloader.hide();

        // Resolve route to load page
        resolve(
          {
            componentUrl: './pages/request-and-load.html',
          },
          {
            context: {
              user: user,
            }
          }
        );
      }, 1000);
    },
  },
  // Default route (404 page). MUST BE THE LAST
  {
    path: '(.*)',
    url: './pages/404.html',
  },
];
