<?php
namespace Elaporan\Controller;

use Elaporan\Controller\AppController;

class MainController extends AppController
{
	public function index(){
		$this->layout = "guest";
        $this->loadModel('User.Users');
		 if($this->Auth->user()){
				switch($this->request->session()->read('Auth.User.roles')[0]['slug']){
					case 'administrator':
					return $this->redirect('/admin');
					break;
					case 'upk':
					return $this->redirect(['controller'=>'Upk','action'=>'index']);
					break;
					case 'srk':
					return $this->redirect(['controller'=>'Srk','action'=>'index']);
					break;
				}
		}
        else
        {
            $this->Flash->danger('Please login to continue');
            $this->redirect('/login');
        }
	}
}
