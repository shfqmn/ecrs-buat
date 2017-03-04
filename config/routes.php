<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/',function(RouteBuilder $routes){
    $routes->connect('/users', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/users/register', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/users/view/*', ['controller' => 'Users', 'action' => 'view']);
    $routes->connect('/users/edit/*', ['controller' => 'Users', 'action' => 'edit']);
    $routes->connect('/users/delete/*', ['controller' => 'Users', 'action' => 'delete']);
    $routes->connect('/users/forgot', ['controller' => 'Users', 'action' => 'forgot']);
    $routes->connect('/activate/*', ['controller' => 'Users', 'action' => 'activate']);
    $routes->connect('/profile', ['controller' => 'Users', 'action' => 'profile']);



    
    $routes->connect('/report/add', ['controller' => 'Report', 'action' => 'add']);
    $routes->connect('/report', ['controller' => 'Report', 'action' => 'index']);
    

    $routes->connect('/announcements/add', ['controller' => 'Announcements', 'action' => 'add']);


    
    $routes->connect('/pdf/view/*', ['controller' => 'reportpdf', 'action' => 'view']);
    $routes->connect('/pdf/pdf/*', ['controller' => 'reportpdf', 'action' => 'pdf']);
    $routes->connect('/pdf/sick/*', ['controller' => 'reportpdf', 'action' => 'sick']);
    
    $routes->connect('/', ['controller' => 'Announcements', 'action' => 'index']);
    $routes->connect('/view/*',['controller'=>'Announcements', 'action'=>'view']);
});

Router::scope('/api', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'apipages', 'action' => 'index' , 'allowWithoutToken'=>true]);
    
    //users controller
    $routes->connect('/users/login', ['controller' => 'apiusers', 'action' => 'login', 'allowWithoutToken' => true]);
    $routes->connect('/users/validate', ['controller' => 'users', 'action' => 'validate', 'allowWithoutToken' => true]);
    $routes->connect('/users/register', ['controller' => 'apiusers', 'action' => 'register', 'allowWithoutToken' => true]);

    //report controller
    $routes->connect('/report/add', ['controller' => 'apireport', 'action' => 'add', 'allowWithoutToken' => true]);

    //announcements controller
    $routes->connect('/announcements', ['controller' => 'announcements', 'action' => 'index', 'allowWithoutToken' => true]);
    });