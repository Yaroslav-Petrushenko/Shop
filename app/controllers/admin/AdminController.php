<?php


    // namespace app\controllers\admin;

    use app\vendor\Controller;
    use app\helpers\helpers;
    use app\models\User;
    use app\helpers\Request;


    class AdminController extends Controller
    {
        // public function actionIndex()
        // {
        //     if (isset($_SESSION['adminUser'])) {
        //         $content = [
        //             $this->getBaseURL()
        //         ];
        //         $this->view('admin/dashboard/dashboard', $content);
        //     } else {
        //         $this->actionLogin();
        //     }
        // }

        public function actionLogin()
        {
        // Якщо Адмін вже залогінений адмін, - кидає на Логаут
            if (isset($_SESSION['user']['id_user'])) {
                header('Location: logout');
            }

            $userModel = new User();

            $postData = $this->getPost();
            $data = [];
            if (!empty($postData)) {
                $errors = $userModel->loginUser($postData);
                if (!empty($errors)) {
                    $data['errors'] = $errors;
                } else {
                    $data['user'] = $_SESSION['user'];
                    // die;
                    return $this->actionIndex($data);
                }
            }
            $this->view('admin/login/login', $data);
        }

        public function actionRegister() // ++++
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
                    return $this->view('admin/login/login');  
                }
            }
            $this->view('admin/register/register', $contact);
            
        }

        // public function actionLogOut()
        // {
        //     $this->view('admin/register/register');
        //     // header('location: lodin');
        // }
        public function actionIndex(array $data = [])
        {
            if (!isset($_SESSION['user']['id_user'])) {
                $this->actionLogin();
            } else {
                $this->view('admin/dashboard/dashboard', $data);
            }
        }

    }

?>