<?php
namespace App\Controller;
use RestApi\Controller\ApiController;
use RestApi\Utility\JwtToken;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;

class ApiUsersController extends ApiController
{
    
    public function initialize()
    {
        parent::initialize();
		
		$this->loadModel('Users');
        $this->loadComponent('Paginator');
    }
	
	public function index()
	{
		$this->httpStatusCode = 200;
		$this->apiResponse['details'] = 'eCRS UiTM REST API. Download app to use :D';
	}

	public function register()
	{
		$this->request->allowMethod('post');
		if (is_null($this->request->data))
		{
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Form is null';
		}
		else
		{
			$user = $this->Users->newEntity($this->request->data);
			try
			{
				if ($this->Users->save($user))
				{
					$this->apiResponse['message'] = 'Registered successfully.';

					// $payload = ['email' => $user->email, 'id' => $user->id];
					// $this->apiResponse['token'] = JwtToken::generateToken($payload);

				}
				else
				{
					$this->httpStatusCode = 400;
					$this->apiResponse['message'] = 'Unable to register user.';
					if ($user->errors())
					{
						$this->apiResponse['message'] = 'Validation failed.';
						foreach($user->errors() as $field => $validationMessage)
						{
							$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
						}
					}
				}
			}

			catch(Exception $e)
			{
				$this->httpStatusCode = 400;
				$this->apiResponse['message'] = 'Unable to register user.';
			}

			unset($user);
			unset($payload);
		}
	}
	
	public function login()
	{
		$this->request->allowMethod('post');
	 
		$entity = $this->Users->newEntity($this->request->data, ['validate' => 'LoginApi']);
	 
		if ($entity->errors()) {
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Validation failed.';
			foreach ($entity->errors() as $field => $validationMessage) {
				$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage)];
			}
		} else {
			
				$user = $this->Users->find()
					->where([
						'email' => $entity->email,
						'active' => 1
					])
					->first();
		 
				if (empty($user)) {
					$this->httpStatusCode = 403;
					$this->apiResponse['error'] = 'User not active or does not exist';
		 
					return;
				}
				else if((new DefaultPasswordHasher)->check($entity->password, $user->password)){
		 
				$payload = ['id' => $user->id];
		 
				$this->apiResponse['token'] = JwtToken::generateToken($payload);
				$this->apiResponse['message'] = 'Logged in successfully.';
                $this->apiResponse['user'] = $user;
				}
				else{
					 $this->httpStatusCode = 403;
					$this->apiResponse['error'] = 'User or password not correct';
				}
		 
				unset($user);
				unset($payload);
			}
	}
	
	public function edit($id = null){
		$this->request->allowMethod('post');
		
		$user = $this->Users->get($id);
		$user = $this->Users->patchEntity($user,$this->request->data);
		
		try
		{
			if ($this->Users->save($user))
			{
				$this->apiResponse['message'] = 'Saved successfully.';

				// $payload = ['email' => $user->email, 'id' => $user->id];
				// $this->apiResponse['token'] = JwtToken::generateToken($payload);

			}
			else
			{
				$this->httpStatusCode = 400;
				$this->apiResponse['message'] = 'Unable to save user.';
				if ($user->errors())
				{
					$this->apiResponse['message'] = 'Validation failed.';
					foreach($user->errors() as $field => $validationMessage)
					{
						$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
					}
				}
			}
		}
		catch(Exception $e)
		{
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Unable to save user.';
		}
		
		unset($user);
		unset($payload);
			
		
	}
    
    public function profile()
    {
        try
        {
            $this->request->allowMethod('get');
            $user_id = $this->jwtPayload;
            
            $this->httpStatusCode = 200;
            $this->apiResponse['user'] = $this->Users->get($user_id);
        }
        catch(Exception $e){
            $this->httpStatusCode = 418;
            $this->apiResponse['message'] = 'Cannot retrive user profile';
        }
    }
    
    public function approve($id){
            try
        {
            $this->request->allowMethod('post');
            $user_id = $this->jwtPayload;
            $user_self = $this->Users->get($user_id);
            
            if($user_self->role != 'cmu')
            {
                $this->httpStatusCode = 401;
                $this->apiResponse['message'] = 'Not Authorize.';
            }
            else
            {
                $user = $this->Users->get($id);
                $user->approved = $this->request->data['approve'] === 'true';
                $this->Users->save($user);
                
                $this->httpStatusCode = 200;
                $this->apiResponse['message'] = 'Successful.';
            }
            
        }
        catch(Exception $e){
            $this->httpStatusCode = 418;
            $this->apiResponse['message'] = 'Cannot retrive user profile';
        }
    }
    
    public function validate(){
        $this->request->allowMethod('post');
        
       $data= $this->Users->newEntity($this->request->getData());
        if($data->errors()){
            $this->httpStatusCode = 200;
            $this->apiResponse['message'] = 'Form validate success';
        }
        else{
            $this->apiResponse['message'] = 'Validation failed.';
            foreach($data->errors() as $field => $validationMessage)
            {
                $this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
            }
            foreach($data->errors() as $field => $validationMessage)
            {
                $this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
            }
        }  
        
        debug(Table::checkRules());
    }

}