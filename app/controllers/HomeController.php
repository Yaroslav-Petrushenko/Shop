<?php

    // namespace app\controllers\admin;

    use app\vendor\Controller;
    use app\vendor\Db;
    use app\models\Product;
    use app\models\User;

    class HomeController extends Controller
    {
        public function actionIndex()
        {
            $userModel = new User();
            $users = $userModel->getAlluser();
            $this->view('home/index', [
                'users' => $users
            ]);
        }
    }

?>