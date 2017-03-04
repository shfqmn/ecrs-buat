<?php
namespace App\Controller;
use RestApi\Controller\ApiController;
use App\Controller\Controller;
use RestApi\Utility\JwtToken;

class UploadsController extends ApiController
{
	public function upload()
	{
		$this->request->allowMethod('post');
		if (is_null($this->request->data))
		{
			$this->httpStatusCode = 400;
			$this->apiResponse['message'] = 'Form is null';
		}
		else
		{
			$upload = $this->Uploads->newEntity($this->request->data);
			try
			{
				if ($this->Uploads->save($upload))
				{
					$this->apiResponse['message'] = 'Upload successfully.';

				}
				else
				{
					$this->httpStatusCode = 400;
					$this->apiResponse['message'] = 'Unable to upload image.';
					if ($upload->errors())
					{
						$this->apiResponse['message'] = 'Validation failed.';
						foreach($upload->errors() as $field => $validationMessage)
						{
							$this->apiResponse['error'][$field] = $validationMessage[key($validationMessage) ];
						}
					}
				}
                
                $this->apiResponse['request'] = $this->request->data;
                $this->apiResponse['data'] = $upload;
			}

			catch(Exception $e)
			{
				$this->httpStatusCode = 400;
				$this->apiResponse['message'] = 'Unable to upload image.';
			}

			unset($upload);
			unset($payload);
		}
	}
}