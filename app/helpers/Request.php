<?php
    namespace app\helpers;
    
    use app\vendor\DataBase;
    use app\vendor\Controller;


    class Request 
    {
        public function checkUserRegisterForm(array $formData)
        {
            $errors = [];

            foreach ($formData as $key => $item) {
                if (empty($item)) {
                    $errors[$key]['desc'] = 'This items is required';
                    $errors[$key]['check'] = true;
                }
            }
            return $errors;
        }


        public function saveMedia()
        {
            $controller = new Controller();
    
            $fileData = $controller->getFiles();
            $postData = $controller->getPost();
    
            $entity['imageName'] = '';
            if ($fileData['main_image']['error'] === UPLOAD_ERR_OK) {
                $uploads_dir = 'app/resource/uploads';
                $type = explode('/', $fileData['main_image']['type']);
                $tmp_name = $fileData['main_image']['tmp_name'];
                $extension = $type[1];
                $fileName = $postData['name'] . '.' . $extension;
                move_uploaded_file($tmp_name, $uploads_dir . '/' . $fileName);
                $entity['imageName'] = $fileName;
            }
    
            return $entity['imageName'];
        }
    }


?>