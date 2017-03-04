<?php
/**
 * Licensed under The GPL-3.0 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since    2.0.0
 * @author   Christopher Castro <chris@quickapps.es>
 * @link     http://www.quickappscms.org
 * @license  http://opensource.org/licenses/gpl-3.0.html GPL-3.0 License
 */

/**
 * You can use this file to set specific routing rules outside the QuickApps CMS
 * core, so updates won't affect them. Warning: This is for advanced users only,
 * those with a proper understanding of PHP and its' syntax.
 *
 * NOTE: This file is included after QuickApps CMS routes.php file.
 */
use Cake\Routing\Router;

Router::scope('/elaporan', function ($routes) {
	
	$routes->connect('/', ['plugin' => 'Elaporan', 'controller' => 'Pages', 'action' => 'display']);
	
	$routes->connect('/upk', ['plugin' => 'Elaporan', 'controller' => 'Upk', 'action' => 'index']);
	$routes->connect('/upk/report/*', ['plugin' => 'Elaporan', 'controller' => 'Upk', 'action' => 'report']);
	
	$routes->connect('/report/pdf/*', ['plugin' => 'Elaporan', 'controller' => 'Report', 'action' => 'pdf']);
	$routes->connect('/report/action/*', ['plugin' => 'Elaporan', 'controller' => 'Report', 'action' => 'actions']);
	$routes->connect('/report/view/*', ['plugin' => 'Elaporan', 'controller' => 'Report', 'action' => 'view']);
	$routes->connect('/report/add', ['plugin' => 'Elaporan', 'controller' => 'Report', 'action' => 'add']);
	$routes->connect('/report/edit/*', ['plugin' => 'Elaporan', 'controller' => 'Report', 'action' => 'edit']);
	
	$routes->connect('/sick/view/*', ['plugin' => 'Elaporan', 'controller' => 'Sick', 'action' => 'view']);
	
	$routes->connect('/srk', ['plugin' => 'Elaporan', 'controller' => 'Srk', 'action' => 'index']);
	
	

});