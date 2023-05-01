<?php
    use app\vendor\Controller;
    use app\helpers\helpers;
    use app\models\Status;
    use app\helpers\Request;

    class StatusController extends Controller
    {
        public function actionIndex()
        {
            $statusModel = new Status();

            $allStatuses = $statusModel->getAll();

            $content = [
                'allStatuses' => $allStatuses
            ];

            return $this->view('admin/status/status', $content);
        }

        public function actionCreate()
        {
            $statusModel = new Status();
            if (!empty($this->getPost('name')) && !empty($this->getPost('category'))){
                $statusModel->incert($this->getPost());
            }
            return $this->actionIndex();
        }
    }

?>