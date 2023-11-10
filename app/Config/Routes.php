<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login','Auth::index');
$routes->post('loginProses','Auth::loginproses');
$routes->get('logout','Auth::logout');

$routes->presenter('register');
$routes->presenter('pegawai');

$routes->get('spt/pelaksana/(:num)','Spt::pelaksana/$1');
$routes->get('spt/getdatajenis','Spt::getdatajenis');
$routes->post('spt/getdatalokasi','Spt::getdatalokasi');
$routes->presenter('spt');

// $routes->get('pelaksana/updatetoggle/(:num)','Pelaksana::updatetoggle/$1');
$routes->post('pelaksana/updatetoggle','Pelaksana::updatetoggle');
$routes->get('pelaksana/sptpdf/(:num)','Pelaksana::sptpdf/$1');
$routes->get('pelaksana/sppdpdf/(:num)','Pelaksana::sppdpdf/$1');
// $routes->get('pelaksana/cekpelaksana/(:num)','Pelaksana::cekpelaksana/$1');
$routes->presenter('pelaksana');

