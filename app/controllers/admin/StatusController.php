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
                $statusModel->insert($this->getPost());
            }
            return $this->actionIndex();
        }

        public function actionDelete()
        {
            
        }

        public function actionUpdate()
        {
            $statusModel = new Status();
            $request = new Request();

            $id = $this->getPost('id_status');

            $content = [
                'name' => $this->getPost('name'),
                'category' => $this->getPost('category')
            ];
            
            if (empty($errors)){
            }
        }
    }

?>