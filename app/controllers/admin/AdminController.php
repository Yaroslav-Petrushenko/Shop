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
        
        public function actionLogin(): void
        {
            $userModel = new User();
            // var_dump($userModel->insert());
            $this->view('admin/login/login');
            // var_dump()
            
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