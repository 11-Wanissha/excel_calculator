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
$routes->get('/pole-retaining-wall-design', 'PoleRetainingWallDesignController::renderer');
$routes->post('/pole-retaining-wall-design', 'PoleRetainingWallDesignController::calculator');
$routes->post('/pole-retaining-wall-design-import', 'PoleRetainingWallDesignController::import');
$routes->post('/pole-retaining-wall-design-export', 'PoleRetainingWallDesignController::export');

/* router for propped-cantilever-beam path */
$routes->get('/propped-cantilever-beam', 'ProppedCantileverBeamController::renderer');
$routes->post('/propped-cantilever-beam', 'ProppedCantileverBeamController::calculate');
$routes->post('/propped-cantilever-beam-import', 'ProppedCantileverBeamController::import');
$routes->post('/propped-cantilever-beam-export', 'ProppedCantileverBeamController::export');

/* router for timber-pole-wall-brooms path */
$routes->get('/timber-pole-retaining-wall-brooms', 'TimberPoleWallBroomsController::renderer');
$routes->post('/timber-pole-retaining-wall-brooms', 'TimberPoleWallBroomsController::calculator');
$routes->post('/timber-pole-retaining-wall-brooms-import', 'TimberPoleWallBroomsController::import');
$routes->post('/timber-pole-retaining-wall-brooms-export', 'TimberPoleWallBroomsController::export');
$routes->post('/timber-pole-retaining-wall-brooms-3D', 'TimberPoleWallBroomsController::calculated3D');

/* router for pile-capacity path */
$routes->get('/pile-capacity', 'PileCapacityController::renderer');
$routes->post('/pile-capacity', 'PileCapacityController::calculator');
$routes->post('/pile-capacity-import', 'PileCapacityController::import');
$routes->post('/pile-capacity-export', 'PileCapacityController::export');
