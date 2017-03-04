<?php
namespace Elaporan\Controller;

use Elaporan\Controller\AppController;

/**
 * Sick Controller
 *
 * @property \App\Model\Table\SickTable $Sick
 */
class SickController extends AppController
{


    /**
     * View method
     *
     * @param string|null $id Sick id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout = 'ajax';
        $this->loadModel('User.Users');
        $this->loadModel('Elaporan.Sick');
        
        $sick = $this->Sick->get($id, [
            'contain' => ['Report']
        ]);

        $srk = $this->Users->get($sick->report->srk_id);
        $this->set('sick', $sick);
        $this->set('srk',$srk);
        $this->set('_serialize', ['sick']);
    }
}
