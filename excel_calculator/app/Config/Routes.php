<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/test', 'Home::test');

$routes->post('/test/post', 'Home::testPostData');

$routes->get('/main', 'Home::main');

/* router for timber-beam path */
$routes->get('/timber-beam', 'TimberBeamController::renderer');
$routes->post('/timber-beam', 'TimberBeamController::calculator');
$routes->post('/timber-beam-import', 'TimberBeamController::import');
$routes->post('/timber-beam-export', 'TimberBeamController::export');

/* router for pole retaining wall path */
$routes->get('/pole-retaining-wall', 'PoleRetainingWallController::renderer');
$routes->post('/pole-retaining-wall', 'PoleRetainingWallController::calculator');