<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(static function () {
    helper(['Settings']);
    return view('404');
});
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['as' => 'home']);
// $routes->get('/testing', 'TestController::index');

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->get('register', function () {
        return redirect()->back()->with('msg', 'Service is not available.');
    }, ['as' => 'signup']);
    // $routes->get('register', 'AuthController::register', ['as' => 'signup']);
    // $routes->post('register/store', 'AuthController::signup', ['as' => 'signup.store']);
    $routes->match(['get', 'post'], 'login', 'AuthController::login', ['as' => 'login']);
    $routes->post('google-signin', 'AuthController::google', ['as' => 'google_sigin']);
});


$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('/user/logout', 'AuthController::logout', ['as' => 'logout']);
    $routes->get('/user/profile', 'ProfileController::index', ['as' => 'profile']);
    $routes->get('/user/profile/edit', 'ProfileController::edit', ['as' => 'profile.edit']);

    $routes->get('/admin/dashboard', 'Dashboard::index', ['as' => 'dashboard']);

    // Posts
    $routes->get('/admin/posts', 'PostController::index', ['as' => 'admin.posts']);
    $routes->get('/admin/posts/new', 'PostController::new', ['as' => 'admin.posts.new']);
    $routes->post('/admin/posts/save', 'PostController::save', ['as' => 'admin.posts.save']);
    $routes->get('/admin/posts/(:segment)/edit', 'PostController::edit/$1', ['as' => 'admin.posts.edit']);
    $routes->post('/admin/posts/(:segment)/update', 'PostController::update/$1', ['as' => 'admin.posts.update']);
    $routes->get('/admin/posts/(:segment)/toggle', 'PostController::toggle/$1', ['as' => 'admin.posts.toggle']);

    $routes->get('/admin/pages', 'PageController::manage', ['as' => 'admin.pages']);
    $routes->get('/admin/pages/new', 'PageController::new', ['as' => 'admin.pages.new']);
    $routes->post('/admin/pages/save', 'PageController::save', ['as' => 'admin.pages.save']);
    $routes->get('/admin/pages/(:segment)/edit', 'PageController::edit/$1', ['as' => 'admin.pages.edit']);
    $routes->post('/admin/pages/(:segment)/update', 'PageController::update/$1', ['as' => 'admin.pages.update']);
    $routes->get('/admin/pages/(:segment)/toggle', 'PageController::toggle/$1', ['as' => 'admin.pages.toggle']);

    $routes->get('/admin/epaper', 'EpaperController::manage', ['as' => 'admin.epaper']);
    $routes->get('/admin/epaper/new', 'EpaperController::new', ['as' => 'admin.epapers.new']);
    $routes->post('/admin/epaper/save', 'EpaperController::save', ['as' => 'admin.epapers.save']);
    $routes->get('/admin/epaper/(:segment)/edit', 'EpaperController::edit/$1', ['as' => 'admin.epapers.edit']);
    $routes->post('/admin/epaper/(:segment)/update', 'EpaperController::update/$1', ['as' => 'admin.epapers.update']);
    $routes->get('/admin/epaper/(:segment)/toggle', 'EpaperController::toggle/$1', ['as' => 'admin.epapers.toggle']);

    $routes->get('/admin/settings', 'SettingsController::index', ['as' => 'admin.settings']);
    $routes->get('/admin/settings/clean-cache', 'SettingsController::clean_cache', ['as' => 'admin.clean.cache']);
    $routes->post('/admin/settings', 'SettingsController::update', ['as' => 'admin.settings.update']);

    $routes->get('/admin/category', 'CategoryController::index', ['as' => 'admin.category']);
    $routes->get('/admin/category/new', 'CategoryController::new', ['as' => 'admin.category.new']);
    $routes->post('/admin/category/save', 'CategoryController::save', ['as' => 'admin.category.save']);
    $routes->get('/admin/category/(:segment)/edit', 'CategoryController::edit/$1', ['as' => 'admin.category.edit']);
    $routes->get('/admin/category/(:segment)/toggle', 'CategoryController::toggle/$1', ['as' => 'admin.category.toggle']);
    $routes->post('/admin/category/(:segment)/update', 'CategoryController::update/$1', ['as' => 'admin.category.update']);
    $routes->post('/admin/category/(:segment)/delete', 'CategoryController::destroy/$1', ['as' => 'admin.category.delete']);

    $routes->get('/admin/users', 'UserController::index', ['as' => 'admin.users']);
    $routes->get('/admin/users/new', 'UserController::new', ['as' => 'admin.users.new']);
    $routes->post('/admin/users/save', 'UserController::save', ['as' => 'admin.users.save']);
    $routes->get('/admin/users/(:segment)/edit', 'UserController::edit/$1', ['as' => 'admin.users.edit']);
    $routes->get('/admin/user/(:segment)/toggle', 'UserController::toggle/$1', ['as' => 'admin.users.toggle']);
    $routes->post('/admin/users/(:segment)/update', 'UserController::update/$1', ['as' => 'admin.users.update']);

    $routes->get('/admin/users/messages', 'Dashboard::blank', ['as' => 'admin.users.message']);
    $routes->get('/admin/users/profile', 'Dashboard::blank', ['as' => 'admin.users.profile']);

    // Upload image from textarea [tinymce]
    $routes->post('/admin/upload_image', 'ImageController::index', ['as' => 'admin.image.upload']);

    $routes->post('/admin/roles/(:segment)/permissions', 'PermissionController::manage/$1', ['as' => 'admin.permission.manage']);
    $routes->get('/admin/roles', 'PermissionController::index', ['as' => 'admin.roles']);
    $routes->get('/admin/roles/new', 'PermissionController::new', ['as' => 'admin.roles.new']);
    $routes->post('/admin/roles/save', 'PermissionController::save', ['as' => 'admin.roles.save']);
    $routes->get('/admin/roles/(:segment)/edit', 'PermissionController::edit/$1', ['as' => 'admin.roles.edit']);
    $routes->post('/admin/roles/(:segment)/update', 'PermissionController::update/$1', ['as' => 'admin.roles.update']);
    $routes->post('/admin/roles/(:segment)/delete', 'PermissionController::destroy/$1', ['as' => 'admin.roles.delete']);
    $routes->get('/admin/support', 'SupportController::index', ['as' => 'admin.support']);

});

$routes->get('/verification/(:segment)', 'ProfileController::verify/$1', ['as' => 'verify']);

$routes->get('/epaper', 'EpaperController::index', ['as' => 'epaper']);
// $routes->get('/epaper/(:segment)', 'EpaperController::issue/$1', ['as' => 'epaper.issue']);

$routes->get('/news/(:segment)', 'Home::news/$1', ['as' => 'news']);
$routes->get('/tags/(:segment)', 'Home::tags/$1', ['as' => 'tag']);
$routes->get('/category/(:segment)', 'Home::tags/$1', ['as' => 'category']);
$routes->get('/author/(:segment)', 'Home::tags/$1', ['as' => 'author']);
$routes->get('/search', 'Home::search', ['as' => 'search']);
$routes->get('/pages/(:segment)', 'PageController::index/$1', ['as' => 'pages']);

$routes->cli('jobs/message/(:segment)', 'JobsController::message/$1');
$routes->cli('jobs/listen', 'JobsController::listen');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
