<?php
namespace App\Controller;

class ReportPdfController extends AppController
{
	public function pdf($id){ 
		$this->loadModel('Report');
        
         $this->viewBuilder()->setLayout(false);
        
        $report = $this->Report->get($id,['contain'=>['Problem','Sick','Users']]);
        $this->set('report',$report);
        $this->set('_serialize', ['report']);
		
	}
	
	public function view($id){ 
		$this->loadModel('Report');
        $this->layout = false;
        
        $report = $this->Report->get($id,['contain'=>['Problem','Sick','Users']]);
        $this->set('report',$report);
        $this->set('_serialize', ['report']);
	}
    
    public function sick($id){
        $this->loadModel('Sick');
        $this->loadModel('Report');
        $this->loadModel('Users');
        $this->layout = false;
        
        $sick = $this->Sick->get($id,['recursive'=> 3]);
        $sick->user = $this->Users->get($this->Report->get($sick->report_id)->user_id);
        $this->Sick->get($id)->Report->Users;
        $this->set('sick',$sick);
        $this->set('_serialize', ['report']);
    }
	
}