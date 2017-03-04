<?php
namespace App\Controller;
use App\Controller\Controller;


class DownloadsController extends AppController
{
    public function fetch($id) {
        $this->autoRender = 'false';
        $this->loadModel("Uploads");
        $file = $this->Uploads->get($id);
        
        $this->response->file(WWW_ROOT.$file['file_dir'].DS.$file['file']);
        // Return response object to prevent controller from trying to render
        // a view

        // Set multiple headers
        $this->response->header([
            'content-type' => $file->file_type,
            'accept-ranges' => 'bytes'
        ]);
       
        return $this->response;
    }
}