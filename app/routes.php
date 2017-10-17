<?php

$router = new Router( isset( $_GET['url'] ) ? $_GET['url'] : '' );

$router->get( '/',         'CalendarController::showAction' );
$router->get( '/calendar', 'CalendarController::showAction' );

$router->post( '/admin/login',  'UserController::loginAction' );
$router->get(  '/admin/logout', 'UserController::logoutAction' );

$router->get(  '/admin',                  'EventController::catalogueAction' );
$router->get(  '/admin/event',            'EventController::catalogueAction' );
$router->get(  '/admin/event/create',     'EventController::createAction' );
$router->get(  '/admin/event/:id',        'EventController::viewAction' );
$router->post( '/admin/event',            'EventController::insertAction' );
$router->post( '/admin/event/:id',        'EventController::updateAction' );
$router->get(  '/admin/event/:id/delete', 'EventController::deleteAction' );

$router->get(  '/admin/location',            'LocationController::catalogueAction' );
$router->get(  '/admin/location/create',     'LocationController::createAction' );
$router->get(  '/admin/location/:id',        'LocationController::viewAction' );
$router->post( '/admin/location',            'LocationController::insertAction' );
$router->post( '/admin/location/:id',        'LocationController::updateAction' );
$router->get(  '/admin/location/:id/delete', 'LocationController::deleteAction' );

$router->run();