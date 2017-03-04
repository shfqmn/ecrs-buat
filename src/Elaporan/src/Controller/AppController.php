<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Elaporan\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
		'authenticate' => [
		'Form' => [
		'fields' => [
		'username' => 'username',
		'password' => 'password'
		]
		]
		],
		'loginAction' => [
            'controller' => '',
            'action' => 'index'
		],
		'authorize' => 'Controller',
		'authError' => 'Access Denied',
		'unauthorizedRedirect' => ['controller' => 'Main']
		]);
		// Allow the display action so our pages controller
		// continues to work.
		$this->Auth->allow(['view']);
    }
    
    public function isAuthorized($user = null){
     //if($this->request->session()->read('Auth.User.roles')[0]['slug'] != 'srk') $this->Auth->deny();
     return true;
     /*
     $role = $this->request->session()->read('Auth.User.roles')[0]['slug'];
     $controller = $this->request->params['controller'];
     $action = $this->request->params['action'];
     
     switch($controller){ //public
         case 'Report':
             switch($action){
                 case 'view':
                 case 'pdf':
                     return true;
                default:
                    return false;
             }
             
        case 'Sick':
             switch($action){
                 case 'view':
                     return true;
                default:
                    return false;
             }
             
         default:
             switch($role){
                 case 'upk':
                     switch($controller){
                         case 'Upk':
                             return true;
                        case 'Report':
                            switch($action){
                                case 'actions':
                                    return true;
                                default:
                                    return true;
                            }
                            
                        default:
                            return true;
                     }
             }
     }  */
  } 
}
