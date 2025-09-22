<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/check', 'DatabaseCheck::index');

$routes->get('/registerView', 'RegistrationController::registerView');
$routes->get('/loginView', 'LoginController::loginView');
$routes->get('/landing', 'PageController::landing');

//create account
$routes->post('/register', 'RegistrationController::registerAccount');

//loginAccount
$routes->post('/login', 'LoginController::loginAccount');
