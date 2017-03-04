<?php
namespace Elaporan\Controller;
use Elaporan\Controller\AppController;
use Cake\Utility\Text;
use Cake\I18n\Time;
use DateTime;


/**
 * Report Controller
 *
 * @property \App\Model\Table\ReportTable $Report
 */

class ReportController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($reference = null)
    {
        $this->loadModel('Elaporan.Problem');
        $this->loadModel('Elaporan.Sick');
        $this->loadModel('User.Users');
        $this->loadModel('Elaporan.Report');

        $this->layout = false;
        $report = $this->Report->findByReference($reference)->first();
		$report->user = $this->Users->get($report->srk_id);
		 $report->problem = $this->Problem->find('all')->where(['report_id ='=>
                                                               $report->id])->toArray();
        $this->set('report',$report);
        $this->set('_serialize', ['report']);
    }

    public function pdf($reference = null){
        $this->loadModel('Sick');
        $this->loadModel('Report');
        $report = $this->Report->findByReference($reference)->first();
        $report->sick = $this->Sick->find('all')->where(['report_id ='=>$report->id])->all();
        $this->set('report',$report);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Problem');
        $this->loadModel('Sick');
        $this->loadModel('User.Users');
        $this->loadModel('Report');

        $report = $this->Report->newEntity();
        $problems = $this->Problem->newEntity();
        $sicks = $this->Sick->newEntity();

        $input = [
            'reportDate'=>'',
            'workingDates'=>'',
            'workingTimes'=>'',
            'problem'=>[['details' => '','timePlace' => '','action' => '','notes' => '']],
            'sick'=>[['datetime' => '','name' => '','ic' => '','homeAddress' => '','studentNo' => '','tel' => '','collegeAddress' => '','courseCode' => '','notes' => '']]
        ];

        if ($this->request->is('post')) {
            $input = $this->request->data;
            $errors = "";
            if($input['reportDate'] === "") $errors .= "Bulan Laporan is required \r\n";
            if($input['workingDates'] === "") $errors .= "Tarikh Bertugas is required \r\n";
            if($input['workingTimes'] === "") $errors .= "Masa Bertugas is required \r\n";



            /********************************************************************************************************************************************/
            //create instance of report
            $report = $this->Report->patchEntity($report,[
                'reference'=>uniqid(),
                'reportDate'=>$input['reportDate'],
                'srk_id'=>$this->request->session()->read('Auth.User.id'),
                'status'=>'sent',
                'reason'=>'',
                'workingDates'=>$input['workingDates'],
                'workingTimes'=>$input['workingTimes']
            ]);
            /******************************************************************************************************************************/
            //remove empty row in form
            for($i=0;$i<count($input['sick']);$i++){
                if(
                    $input['sick'][$i]['datetime']=="" &&
                    $input['sick'][$i]['name']=="" &&
                    $input['sick'][$i]['courseCode']=="" &&
                    $input['sick'][$i]['ic']=="" &&
                    $input['sick'][$i]['tel']=="" &&
                    $input['sick'][$i]['studentNo']=="" &&
                    $input['sick'][$i]['notes']=="" &&
                    $input['sick'][$i]['homeAddress']=="" &&
                    $input['sick'][$i]['collegeAddress']==""
                ){
                    unset($input['sick'][$i]);
                    $input['sick'] = array_values($input['sick']);
                    $i--;
                }
            }

            for($i=0;$i<count($input['problem']);$i++){
                if(
                    $input['problem'][$i]['details']=="" &&
                    $input['problem'][$i]['timePlace']=="" &&
                    $input['problem'][$i]['action']=="" &&
                    $input['problem'][$i]['notes']==""
                ){
                    unset($input['problem'][$i]);
                    $input['problem'] = array_values($input['problem']);
                    $i--;
                }
            }

            /******************************************************************************************************************************************/
            //check no problem & no sick
            if(count($input['problem']) >0){
                $noProblem = false;
                //check missing field problem
                foreach($input['problem'] as $problem){
                    if(
                        $problem['details']=="" ||
                        $problem['timePlace']=="" ||
                        $problem['action']=="" ||
                        $problem['notes']==""

                    ){
                        $errors .= "Some fields in Laporan is missing \r\n";
                        $problemMissing = true;
                        break;
                    }//end if
                    else{
                        $problemMissing = false;
                    }//end else
                }//end foreach

            }
            else{
                $problemMissing = false;
                $noProblem = true;
            }

            //check no sick
            if(count($input['sick'])>0){
                $noSick = false;
                //check missing field sick
                foreach($input['sick'] as $sick){
                    if(
                        $sick['datetime']=="" ||
                        $sick['name']=="" ||
                        $sick['courseCode']=="" ||
                        $sick['ic']=="" ||
                        $sick['tel']=="" ||
                        $sick['studentNo']=="" ||
                        $sick['notes']=="" ||
                        $sick['homeAddress']=="" ||
                        $sick['collegeAddress']==""
                    ){
                        $errors .= "Some fields in Pelajar Sakit is missing \r\n";
                        $sickMissing = true;
                        break;
                    }//end if
                    else{
                        $sickMissing = false;
                    }//end else
                }//end foreach
            }
            else{
                $sickMissing = false;
                $noSick = true;
            }

            /********************************************************************************************************************************************/
            if($errors == ""){
                $report->noProblem = $noProblem; 
                if($this->Report->save($report)){
                    //save Problem
                    if($noProblem == true){
                        $problems = $this->Problem->patchEntity($problems,[
                            'details'=>"Tiada sebarang aduan yang diterima dari para pelajar.",
                            'timePlace'=>"Sepanjang bulan ".$this->Report->find('all')->where(['srk_id ='=> 
                                                                                               $this->Auth->User('id')])->
                            order(['id'=>'DESC'])->
                            first()->
                            toArray()['reportDate'],
                            'action'=>"-",
                            'notes'=>"-",
                            'report_id'=>$this->Report->find('all')->where(['srk_id ='=> 
                                                                            $this->Auth->User('id')])->
                            order(['id'=>'DESC'])->
                            first()->
                            toArray()['id'] 
                        ]);
                        $this->Problem->save($problems);
                    }
                    else{
                        //save problem
                        foreach($input['problem'] as $problem){
                            $problems = $this->Problem->patchEntity($problems,[
                                'details'=>$problem['details'],
                                'timePlace'=>$problem['timePlace'],
                                'action'=>$problem['action'],
                                'notes'=>$problem['notes'],
                                'report_id'=>$this->Report->find('all')->where(['srk_id ='=> 
                                                                                $this->Auth->User('id')])->
                                order(['id'=>'DESC'])->
                                first()->
                                toArray()['id']

                            ]);

                            $this->Problem->save($problems);
                            $problems=$this->Problem->newEntity();
                        }//end foreach
                    }


                    /***************************************************************************************************************************************/
                    //save sick 
                    if($noSick == false){  
                        foreach($input['sick'] as $sick){
                            $sicks = $this->Sick->patchEntity($sicks,[
                                
                                'datetime'=>Time::parse(DateTime::createFromFormat('d/m/Y h:i A', $sick['datetime'])->format('Y-m-d H:i:s')),
                                'name'=>$sick['name'],
                                'courseCode'=>$sick['courseCode'],
                                'ic'=>$sick['ic'],
                                'tel'=>$sick['tel'],
                                'studentNo'=>$sick['studentNo'],
                                'notes'=>$sick['notes'],
                                'homeAddress'=>$sick['homeAddress'],
                                'collegeAddress'=>$sick['collegeAddress'],
                                'report_id'=>$this->Report->find('all')->where(['srk_id ='=> 
                                                                                $this->Auth->User('id')])->
                                order(['id'=>'DESC'])->
                                first()->
                                toArray()['id']
                            ]);
                           
                            $this->Sick->save($sicks);
                            $sicks=$this->Sick->newEntity();
                        }//end foreach
                    }//end if
                }
                else{
                    $this->Flash->danger('report could not be saved');
                }
            }
            /****************************************************************************************************************************/
        }//end if

        /*****************************************************************************************************************/
        if(count($input['problem'])==0)
            $input['problem'] = [['details' => '','timePlace' => '','action' => '','notes' => '']];

        if(count($input['sick'])==0){
            $input['sick'] = [['datetime' => '','name' => '','ic' => '','homeAddress' => '','studentNo' => '','tel' => '','collegeAddress' => '','courseCode' => '','notes' => '']];
        }

        if(isset($errors)&& $errors != "" ) $this->Flash->error($errors); //display error

        if(isset($errors)&& $errors == ""){
            $this->redirect(['controller'=>'Srk','action'=>'report']);
            $this->Flash->success("Report save success");
        }
        $report = $this->Report->newEntity();
        $this->set(compact('report', 'srk','input'));
        $this->set('_serialize', ['report']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Elaporan.Problem');
        $this->loadModel('Elaporan.Sick');
        $this->loadModel('User.Users');
        $this->loadModel('Elaporan.Report');

        $report = $this->Report->newEntity();
        $problems = $this->Problem->newEntity();
        $sicks = $this->Sick->newEntity();

        $report = $this->Report->get($id,['contain'=>['Problem','Sick']]);
        $input = $report->toArray();
        $noProblem = $input['noProblem'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $input = $this->request->data;
            $errors = "";
            if($input['reportDate'] === "") $errors .= "Bulan Laporan is required \r\n";
            if($input['workingDates'] === "") $errors .= "Tarikh Bertugas is required \r\n";
            if($input['workingTimes'] === "") $errors .= "Masa Bertugas is required \r\n";


            /*************************************************************************************************************************************/
            //remove empty row
            for($i=0;$i<count($input['sick']);$i++){
                if($input['sick'][$i]['datetime']=="" &&$input['sick'][$i]['name']=="" &&$input['sick'][$i]['courseCode']=="" &&$input['sick'][$i]['ic']=="" &&$input['sick'][$i]['tel']=="" &&$input['sick'][$i]['studentNo']=="" &&$input['sick'][$i]['notes']=="" &&$input['sick'][$i]['homeAddress']=="" &&$input['sick'][$i]['collegeAddress']==""){
                    unset($input['sick'][$i]);
                    $input['sick'] = array_values($input['sick']);
                    $i--;
                }
            }

            for($i=0;$i<count($input['problem']);$i++){
                if($input['problem'][$i]['details']=="" &&$input['problem'][$i]['timePlace']=="" &&$input['problem'][$i]['action']=="" &&$input['problem'][$i]['notes']==""){
                    unset($input['problem'][$i]);
                    $input['problem'] = array_values($input['problem']);
                    $i--;
                }
            }

            /******************************************************************************************************************************************/
            //check no problem & no sick
            if(count($input['problem']) >0){
                $noProblem = false;
                //check missing field problem
                foreach($input['problem'] as $problem){
                    if($problem['details']=="" ||$problem['timePlace']=="" ||$problem['action']=="" ||$problem['notes']==""){
                        $errors .= "Some fields in Laporan is missing \r\n";
                        $problemMissing = true;
                        break;
                    }//end if
                    else{
                        $problemMissing = false;
                    }//end else
                }//end foreach

            }
            else{
                $problemMissing = false;
                $noProblem = true;
            }

            //check no sick
            if(count($input['sick'])>0){
                $noSick = false;
                //check missing field sick
                foreach($input['sick'] as $sick){
                    if($sick['datetime']=="" ||$sick['name']=="" ||$sick['courseCode']=="" ||$sick['ic']=="" ||$sick['tel']=="" ||$sick['studentNo']=="" ||$sick['notes']=="" ||$sick['homeAddress']=="" ||$sick['collegeAddress']==""){
                        $errors .= "Some fields in Pelajar Sakit is missing \r\n";
                        $sickMissing = true;
                        break;
                    }//end if
                    else{
                        $sickMissing = false;
                    }//end else
                }//end foreach
            }
            else{
                $sickMissing = false;
                $noSick = true;
            }

            if($sickMissing==false && $problemMissing==false){
                //update report
                $report->status = "updated";
                $report->reason = "";
                $report->workingDates = $input['workingDates'];
                $report->workingTimes = $input['workingTimes'];
                $report->last_updated = time();
                $report->noProblem = $noProblem;
                $report->reportDate = $input['reportDate'];

                //update problem

                $this->Problem->deleteAll(['report_id'=>$report->id]);
                if($noProblem == true){
                    $problems = $this->Problem->patchEntity($problems,[
                        'details'=>"Tiada sebarang aduan yang diterima dari para pelajar.",
                        'timePlace'=>"Sepanjang bulan ".$this->Report->get($report->id)->toArray()['reportDate'],
                        'action'=>"-",
                        'notes'=>"-",
                        'report_id'=>$this->Report->get($report->id)->toArray()['id'] 
                    ]);
                    $report->problem = $problems;
                }
                else{
                    //save problem
                    $report->problem =[];
                    foreach($input['problem'] as $problem){
                        $problems = $this->Problem->patchEntity($problems,[
                            'details'=>$problem['details'],
                            'timePlace'=>$problem['timePlace'],
                            'action'=>$problem['action'],
                            'notes'=>$problem['notes'],
                            'report_id'=> $report->id

                        ]);

                        array_push($report->problem,$problems);
                        $problems=$this->Problem->newEntity();
                    }//end foreach
                }
                
                //save sick
                $this->Sick->deleteAll(['report_id'=>$report->id]);
                $report->sick = [];
                if($noSick == false){  
                        foreach($input['sick'] as $sick){
                            $sicks = $this->Sick->patchEntity($sicks,[
                                'datetime'=>Time::parse(DateTime::createFromFormat('d/m/Y h:i A', $sick['datetime'])->format('Y-m-d H:i:s')),
                                'name'=>$sick['name'],
                                'courseCode'=>$sick['courseCode'],
                                'ic'=>$sick['ic'],
                                'tel'=>$sick['tel'],
                                'studentNo'=>$sick['studentNo'],
                                'notes'=>$sick['notes'],
                                'homeAddress'=>$sick['homeAddress'],
                                'collegeAddress'=>$sick['collegeAddress'],
                                'report_id'=>$report->id
                            ]);

                            array_push($report->sick,$sicks);
                            $sicks=$this->Sick->newEntity();
                        }//end foreach
                    }//end if

                
                $this->Report->save($report);

            }

            /**************************************************************************************************************************************/
        }
        /****************************************************************************************************************************/

        if($noProblem)
            $input['problem'] = [['details' => '','timePlace' => '','action' => '','notes' => '']];
        if(count($input['sick'])==0)
            $input['sick']=[['datetime' => '','name' => '','ic' => '','homeAddress' => '','studentNo' => '','tel' => '','collegeAddress' => '','courseCode' => '','notes' => '']];

        if(isset($errors)&& $errors != "" ) $this->Flash->error($errors); //display error

        if(isset($errors)&& $errors == ""){
            $this->redirect(['controller'=>'Srk','action'=>'report']);
        $this->Flash->success("Report update success");
        }






        /*************************************************************************************************/

        $this->set(compact(['input']));
        $this->set('_serialize',['input']);
    }


    public function actions($id = null){
        $this->loadModel('Elaporan.Report');
        
        if($this->request->is('post'))
        {
            $input = $this->request->data;

            if($input['status'] == '' && $input['reason'] == '' ){
                if($input['status'] == '')
                    $this->Flash->danger('Please select status');
                if($input['reason'] == '')
                    $this->Flash->danger('Please enter reason');
            }
            else
            {
                $report = $this->Report->get($id);
                $report->status = $input['status'];
                $report->reason = $input['reason'];

                if($this->Report->save($report))
                {
                    $this->Flash->success('Action Updated');
                    return $this->redirect(['controller'=>'upk','action'=>'index']);
                }
                else
                {
                    $this->Flash->error('Fail to update');
                }
            }
        }
    }
}
