<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('movie/page/(:num)', 'Home::index/$1'); // Route for additional pages
$routes->get('movie/page/(:num)', 'Home::index/$1'); // Route for additional pages
$routes->get('(:segment)', 'Home::single_page/$1');
$routes->get('single/(:any)', 'Home::single/$1');
$routes->post('single/add-rating', 'Home::ajax_add_rating');
$routes->post('ajax_movie_search', 'Home::ajax_serch_movies');

// movie
$routes->get('movie/holly-wood', 'Home::movies_all');

#test
$routes->get('movie/page/names', 'Home::try_test');

#admin
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::dashboard');
    $routes->post('dashboard/ajax_get_all_movies', 'Dashboard::ajax_get_all_movies');
    $routes->post('dashboard/ajax_handel_edit_rows', 'Dashboard::ajax_handel_edit_row');
    $routes->post('dashboard/ajax_handel_delete_rows', 'Dashboard::ajax_handel_delete_row');
    $routes->post('dashboard/add-update-movie', 'Dashboard::movie_add_update');

    #setting
    $routes->get('site-setting/general', 'Setting::index');
    $routes->get('site-setting/meta', 'Setting::meta_setting');
    $routes->post('site-setting/update/(:any)', 'Setting::update_setting/$1');
});
