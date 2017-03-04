<?php
namespace CMS\Controller;

use Cake\Controller\Controller as CakeController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Admin Controller
 *
 * @property \App\Model\Table\AdminTable $Admin
 */

class AdminController extends Controller
{ 
    public function beforeFilter(\Cake\Event\Event $event)
    {
         $this->Auth->config('authenticate', ['Form' => ['userModel' => 'Admin']]);
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('admin', $this->paginate($this->Admin));
        $this->set('_serialize', ['admin']);
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admin = $this->Admin->newEntity();
        if ($this->request->is('post')) {
            $admin = $this->Admin->patchEntity($admin, $this->request->data);
            if ($this->Admin->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));
                return $this->redirect(['controller'=>'Admin','action' => 'index']);
            } else {
                $this->Flash->error(__('The admin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $admin = $this->Admin->get($this->request->session()->read('Auth.User.id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            if($this->request->data['password'] == null){
                $admin = $this->Admin->patchEntity($admin,['name'=>$data['name']]);
            }
            else{
                
                if((new DefaultPasswordHasher())->check($this->request->data['password'],$admin['password'])){
                    if($this->request->data['new-password']==$this->request->data['new-password2']){
                        if($this->request->data['new-password']==null || $this->request->data['new-password2']==null){
                            $this->Flash->error("Password cant be empty");
                            return;
                        }
                         $admin = $this->Admin->patchEntity($admin,['name'=>$data['name'],'password'=>$data['new-password']]);
                    }
                    else{
                        $this->Flash->error("The password does not match");
                        return;
                    }
                }
                else{
                    $this->Flash->error("The password is incorrect");
                    return;
                }
            }
            
            if ($this->Admin->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The admin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('admin'));
        $this->set('_serialize', ['admin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admin->get($id);
        if ($this->Admin->delete($admin)) {
            $this->Flash->success(__('The admin has been deleted.'));
        } else {
            $this->Flash->error(__('The admin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function login()
	{
        $this->layout = "guest";
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$this->request->session()->write('Auth.User.type','admin');
				return $this->redirect(['controller'=>'Admin','action'=>'index']);
			}
			$this->Flash->error('Your username or password is incorrect.');
		}
	}
	
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}
    
     public function display()
    {
        $this->set('admin', $this->paginate($this->Admin));
        $this->set('_serialize', ['admin']);
    }
}
