<?php

    // namespace app\controllers\admin;

    use app\vendor\Controller;
    use app\helpers\helpers;
    use app\models\User;
    use app\helpers\Request;


    class AdminController extends Controller
    {
        public function actionIndex()
        {
            if (isset($_SESSION['adminUser'])) {
                $this->view('admin/dashboard/dashboard');
            } else {
                $this->actionLogin();
            }
            
            
        }
        
        public function actionLogin()
        {
            $userModel = new User();
    
            $postData = $this->getPost();
            $data = [];

            if (isset($_SESSION['users']['admin'])) {
                header('Location: logout');
            }
    
            if (!empty($postData)) {
                $errors = $userModel->loginUser($postData);
                if (!empty($errors)) {
                    $data['errors'] = $errors;
                } else {
                    $data['user'] = $postData;
                
                    return $this->actionIndex($data);
                }
            }
            $this->view('admin/login/login');            
        }

        public function actionRegister()
        {
            $userModel = new User();
            $request = new Request();

            $userData = $this->getPost();
            $contact = [];

            if (!empty($userData)) {
                $errors = $request->checkUserRegisterForm($userData);
                if (!empty($errors)){
                    $contact['errors'] = $errors;
                } else {
                    $user = $userModel->save($userData);
                }
            }
            $this->view('admin/register/register', $contact);
            
        }

        // public function actionLogOut()
        // {
        //     $this->view('admin/register/register');
        //     // header('location: lodin');
        // }

    }

?>