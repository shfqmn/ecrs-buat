<?php
namespace CMS\Controller;

use Cake\Controller\Controller as CakeController;

/**
 * Problem Controller
 *
 * @property \App\Model\Table\ProblemTable $Problem
 */
class ProblemController extends Controller
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('problem', $this->paginate($this->Problem));
        $this->set('_serialize', ['problem']);
    }

    /**
     * View method
     *
     * @param string|null $id Problem id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $problem = $this->Problem->get($id, [
            'contain' => ['Reportproblem']
        ]);
        $this->set('problem', $problem);
        $this->set('_serialize', ['problem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $problem = $this->Problem->newEntity();
        if ($this->request->is('post')) {
            $problem = $this->Problem->patchEntity($problem, $this->request->data);
            if ($this->Problem->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('problem'));
        $this->set('_serialize', ['problem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Problem id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $problem = $this->Problem->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $problem = $this->Problem->patchEntity($problem, $this->request->data);
            if ($this->Problem->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The problem could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('problem'));
        $this->set('_serialize', ['problem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Problem id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $problem = $this->Problem->get($id);
        if ($this->Problem->delete($problem)) {
            $this->Flash->success(__('The problem has been deleted.'));
        } else {
            $this->Flash->error(__('The problem could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
