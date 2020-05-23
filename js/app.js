// Dom7
var $$ = Dom7;

var infiniteLoading = false;

// Framework7 App main instance
var app  = new Framework7({
  root: '#app', // App root element
  id: 'fun.ignition.app', // App bundle ID
  name: 'Ignition', // App name
  theme: 'ios', // Automatic theme detection
  statusbar: {
    overlay: "standalone" in window.navigator && window.navigator.standalone && (document.querySelector('meta[name="apple-mobile-web-app-status-bar-style"]').getAttribute('content').indexOf('translucent') >= 0),
  },
  // App root data
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
      },
      // Demo products for Catalog sectio
      products: [
        {
          id: '0',
          title: 'All Apps',
          author: 'Ignition',
          category: 'All Apps',
          description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempora similique reiciendis, error nesciunt vero, blanditiis pariatur dolor, minima sed sapiente rerum, dolorem corrupti hic modi praesentium unde saepe perspiciatis.'
        },
        {
          id: '1',
          title: 'AppStore',
          author: 'Ignition',
          category: 'appstore',
          description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempora similique reiciendis, error nesciunt vero, blanditiis pariatur dolor, minima sed sapiente rerum, dolorem corrupti hic modi praesentium unde saepe perspiciatis.'
        },
        {
          id: '2',
          title: 'Emulators',
          author: 'Ignition',
          category: 'emulators',
          description: 'Velit odit autem modi saepe ratione totam minus, aperiam, labore quia provident temporibus quasi est ut aliquid blanditiis beatae suscipit odio vel! Nostrum porro sunt sint eveniet maiores, dolorem itaque!'
        },
        {
          id: '3',
          title: 'Entertainment',
          author: 'Ignition',
          category: 'entertainment',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
        {
          id: '4',
          title: 'Experimental',
          author: 'Ignition',
          category: 'experimental',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
        {
          id: '5',
          title: 'Games',
          author: 'Ignition',
          category: 'games',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
        {
          id: '6',
          title: 'Jailbreaks',
          author: 'Ignition',
          category: 'jailbreaks',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
        {
          id: '7',
          title: 'Social',
          author: 'Ignition',
          category: 'social',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
        {
          id: '8',
          title: 'Tweaked',
          author: 'Ignition',
          category: 'tweaked',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
        {
          id: '9',
          title: 'Unknown',
          author: 'Ignition',
          category: 'unknown',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
        {
          id: '10',
          title: 'Utilities',
          author: 'Ignition',
          category: 'utilities',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
      ]
    };
  },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  // App routes
  routes: routes,

  view: {
    xhrCache: false,
  },
  on: {
    // each object key means same name event handler
    routerAjaxStart: function (xhr) {
      app.progressbar.show('multi');
    },
    routerAjaxComplete: function (popup) {
      infiniteLoading = false;
      app.progressbar.hide();
    },
    tabShow: function(tab) {
      // $$.ajax({
      //   url: 'https://ignition.fun/statusKKKK.txt',
      //   type: 'GET',
      //   success: function(data) {
      //     $$(".status").text(data);
      //   }
      // });
      app.request.get('https://ignition.fun/statusKKKK.txt', function (data) {
        console.log(data);
        $$(".status").text(data);
      });
    }
  },
});

// Init/Create views
var homeView = app.views.create('#view-home', {
  url: '/'
});
var catalogView = app.views.create('#view-catalog', {
  url: '/catalog/'
});
// var exoresignView = app.views.create('#view-exoresign', {
//   url: '/exoresign/'
// }); 
var newsView = app.views.create('#view-news', {
  url: '/news/'
});
var settingsView = app.views.create('#view-search', {
  url: '/search/'
});


$$(".searchTab").on('tab:show', function(event) {
  var searchbar = app.searchbar.create({
    el: '.searchbar',
    searchContainer: '.list',
    searchIn: '.item-title',
    on: {
      search(sb, query, previousQuery) {
        console.log(query, previousQuery);
      }
    }
  });

  // var page = event.detail;
  // console.log(event);
  $$('.searchTab').find('script').each(function (el) {
      if ($$(this).attr('src')) {
          var s = document.createElement('script');
          s.src = $$(this).attr('src');
          $$('head').append(s);
      } else {
          eval($$(this).text());
      }
  });

});

$$(".catalogTab").on('tab:show', function(event) {

  // var page = event.detail;
  // console.log(event);
  $$('.catalogTab').find('script').each(function (el) {
      if ($$(this).attr('src')) {
          var s = document.createElement('script');
          s.src = $$(this).attr('src');
          $$('head').append(s);
      } else {
          eval($$(this).text());
      }
  });

});

$$(".newsTab").on('tab:show', function(event) {

  // var page = event.detail;
  // console.log(event);
  $$('.newsTab').find('script').each(function (el) {
      if ($$(this).attr('src')) {
          var s = document.createElement('script');
          s.src = $$(this).attr('src');
          $$('head').append(s);
      } else {
          eval($$(this).text());
      }
  });

});

$$(document).on('page:afterin', '.page[data-name="view-category"]', function (e) {
  var searchbar = app.searchbar.create({
    el: '.catSearch',
    searchContainer: '.list',
    searchIn: '.item-title',
    on: {
      search(sb, query, previousQuery) {
        console.log(query, previousQuery);
      }
    }
  });
});


$$(document).on('page:afterin', function (e) {
  var page = e.detail;
  $$(page.container).find('script').each(function (el) {
      if ($$(this).attr('src')) {
          var s = document.createElement('script');
          s.src = $$(this).attr('src');
          $$('head').append(s);
      } else {
          eval($$(this).text());
      }
  });
});


$$(document).on('page:init', function (e) {
  // Page Data contains all required information about loaded and initialized page
  var page = e.detail;
  $$(page.container).find('script').each(function (el) {
      if ($$(this).attr('src')) {
          var s = document.createElement('script');
          s.src = $$(this).attr('src');
          $$('head').append(s);
      } else {
          eval($$(this).text());
      }
  });
});

$$(document).on('page:reinit', function (e) {
  // Page Data contains all required information about loaded and initialized page
  var page = e.detail;
  $$(page.container).find('script').each(function (el) {
      if ($$(this).attr('src')) {
          var s = document.createElement('script');
          s.src = $$(this).attr('src');
          $$('head').append(s);
      } else {
          eval($$(this).text());
      }
  });
});

// Login Screen Demo
$$('#my-login-screen .login-button').on('click', function () {
  var username = $$('#my-login-screen [name="username"]').val();
  var password = $$('#my-login-screen [name="password"]').val();

  // Close login screen
  app.loginScreen.close('#my-login-screen');

  // Alert username and password
  app.dialog.alert('Username: ' + username + '<br>Password: ' + password);
});

