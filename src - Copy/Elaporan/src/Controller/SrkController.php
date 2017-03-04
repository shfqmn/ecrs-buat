<?php
namespace Elaporan\Controller;

use Elaporan\Controller\AppController;
use DateTime;
/**
 * Srk Controller
 *
 * @property \App\Model\Table\SrkTable $Srk
 */
class SrkController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    
    public function index()
    {
    }
    
    public function report(){
        $this->loadModel('Elaporan.Report');
        $this->set('reports', $this->paginate($this->Report->find('all')->where(['srk_id'=>$this->request->session()->read('Auth.User.id')])));
        $this->set('_serialize', ['reports']);

    }
}
