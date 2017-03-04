<?php
namespace App\Controller;

use RestApi\Controller\ApiController;

/**
 * Announcements Controller
 *
 * @property \App\Model\Table\AnnouncementsTable $Announcements
 */
class ApiAnnouncementsController extends ApiController
{
     public $paginate = [
        'fields' => ['Announcements.title', 'Announcements.created','Announcements.body'],
        'limit' => 5,
        'order' => [
            'Articles.created' => 'desc'
        ]
    ];
    
    public function initialize()
    {
        parent::initialize();
		
		$this->loadModel('Announcements');
        $this->loadComponent('Paginator');
    }

    public function index(){
        $announcement = $this->Announcements->find('all');
        $this->apiResponse = $this->paginate();
       
    }

    /**
     * View method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => []
        ]);

        $this->apiResponse['response'] = $announcement;
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       $this->request->allowMethod('post');
		if (is_null($this->request->data))
		{
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Form is null';
		}
		else
		{
			$announcement = $this->Announcements->newEntity($this->request->data);
			try
			{
				if ($this->Announcements->save($announcement))
				{
					$this->apiResponse['message'] = 'Upload successfully.';

				}
				else
				{
					$this->httpStatusCode = 400;
					$this->apiResponse['message'] = 'Unable to save announcement.';
					if ($announcement->errors())
					{
						$this->apiResponse['message'] = 'Validation failed.';
						foreach($announcement->errors() as $field => $validationMessage)
						{
							$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
						}
					}
				}
			}

			catch(Exception $e)
			{
				$this->httpStatusCode = 400;
				$this->apiResponse['message'] = 'Unable to save announcement.';
			}

			unset($announcement);
			unset($payload);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
       $this->request->allowMethod('post');
		if (is_null($this->request->data))
		{
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Form is null';
		}
		else
		{
            $announcement = $this->Announcements->get($id);
			$announcement = $this->Announcements->patchEntity($announcement,$this->request->data);
			try
			{
				if ($this->Announcements->save($announcement))
				{
					$this->apiResponse['message'] = 'save successfully.';

				}
				else
				{
					$this->httpStatusCode = 400;
					$this->apiResponse['message'] = 'Unable to save announcement.';
					if ($announcement->errors())
					{
						$this->apiResponse['message'] = 'Validation failed.';
						foreach($announcement->errors() as $field => $validationMessage)
						{
							$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
						}
					}
				}
			}

			catch(Exception $e)
			{
				$this->httpStatusCode = 400;
				$this->apiResponse['message'] = 'Unable to save announcement.';
			}

			unset($announcement);
			unset($payload);
        }
    }
}