<?php
namespace Elaporan\Controller;
use Elaporan\Controller\AppController;

class UpkController extends AppController
{
	
     public function index()
     {
        $this->loadModel('User.Users');
        $this->loadModel('Roles');
        
        $currSector = $this->request->session()->read('Auth.User._fields')['sector']->value;
        $this->set('upk',$this->paginate($this->Users->find()
                 ->matching('Roles', function ($q) {
                return $q->where(['Roles.slug' => 'srk']);
            })->where(['Users.sector'=>$currSector])));
            
            
        //$this->set('upk',$this->paginate($this->Users->getSrkSector($currSector)));
        $this->set('_serialize', ['upk']);
     }
    
    public function report($id = null){
        $this->loadModel('Elaporan.Report');
         $reports = $this->Report->find('all')->where(['srk_id'=>$id])->contain(['Users']);
        
        $this->set('reports', $this->paginate($reports));
        $this->set('_serialize', ['reports']);
    }
}