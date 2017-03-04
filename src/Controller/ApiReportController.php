<?php
namespace App\Controller;

use RestApi\Controller\ApiController;


/**
 * Report Controller
 *
 * @property \App\Model\Table\ReportTable $Report
 */
class ApiReportController extends ApiController
{
     public $paginate = [
        'fields' => ['Report.id', 'Report.created','Report.reportDate'],
        'limit' => 5,
        'order' => [
            'Report.created' => 'desc'
        ]
    ];
    
    public function initialize()
    {
        parent::initialize();
		
		$this->loadModel('Report');
        $this->loadComponent('Paginator');
    }

    public function index(){
        $report = $this->Report->find('all')->where(['user_id'=>$this->jwtPayload]);
        $this->apiResponse = $this->paginate();
       
    }
    
    public function add()
	{
		debug($this->request->getData());
		$this->request->allowMethod('post');
		if (is_null($this->request->data))
		{
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Form is null';
		}
		else
		{
			$report = $this->Report->newEntity($this->request->data);
			try
			{
				if ($this->Report->save($report))
				{
					$this->apiResponse['message'] = 'Report saved successfully.';

				}
				else
				{
					$this->httpStatusCode = 400;
					$this->apiResponse['message'] = 'Unable to save report.';
					if ($report->errors())
					{
						$this->apiResponse['message'] = 'Validation failed.';
						foreach($report->errors() as $field => $validationMessage)
						{
							$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
						}
					}
				}
			}

			catch(Exception $e)
			{
				$this->httpStatusCode = 400;
				$this->apiResponse['message'] = 'Unable to save report.';
			}

			unset($report);
			unset($payload);
		}
	}

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
		$this->request->allowMethod('post');
		
		$report = $this->Report->get($id);
		$report = $this->Report->patchEntity($report,$this->request->data);
		
		try
		{
			if ($this->Report->save($report))
			{
				$this->apiResponse['message'] = 'Saved successfully.';

			}
			else
			{
				$this->httpStatusCode = 400;
				$this->apiResponse['message'] = 'Unable to save report.';
				if ($report->errors())
				{
					$this->apiResponse['message'] = 'Validation failed.';
					foreach($report->errors() as $field => $validationMessage)
					{
						$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
					}
				}
			}
		}
		catch(Exception $e)
		{
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Unable to save report.';
		}
		
		unset($report);
		unset($payload);
			
		
	}

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Report->get($id);
        if ($this->Report->delete($report)) {
            $this->httpStatusCode = 200;
            $this->apiResponse['message'] = 'deleted';
        } else {
            $this->httpStatusCode = 400;
            $this->apiResponse['message'] = 'failed to be deleted';
        }

    }
    
    public function view($id){
        $this->request->allowMethod('get');
        $report = $this->Report->find('all')->where(['user_id'=>$id])->toArray();
        
        $this->httpStatus = 200;
        $this->apiResponse['details'] = $report;
    }
}