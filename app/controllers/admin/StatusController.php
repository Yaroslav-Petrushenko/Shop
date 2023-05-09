<?php 
    use app\vendor\Controller;
    use app\helpers\Request;
    use app\models\Status;

    class StatusController extends Controller
    {
        public function actionIndex()
        {
            $statusModel = new Status();

            $allStatuses = $statusModel->getAll();
            $content = [
                'allStatuses' => $allStatuses,
            ];

            return $this->view('admin/status/status', $content);
        }
        
        public function actionCreate()
        {
            $request = new Request();
            
            $errors = $request->checkUserRegisterForm($this->getPost());
            if (empty($errors)) {
                $statusModel = new Status();
                $statusModel->insert($this->getPost());
            }
            
            return $this->redirect('../status');
        }

        public function actionChange() : void
        {
            if (isset($_POST['update'])) {
                $this->actionUpdate();
            } elseif (isset($_POST['delete'])) {
                $this->actionDelete();
            }
        }

        public function actionUpdate()
        {
            $statusModel = new Status();
            $data = [
                'id_status' => $this->getPost('id_status'),
                'name' => $this->getPost('name'),
                'category' => $this->getPost('category'),
            ];

            $statusModel->update($this->getPost('id_status'), $data);
    
            return $this->redirect('../status');
        }

        public function actionDelete()
        {
            if ($this->getPost('delete')) {
                $statusModel = new Status();
                $idStatus = $this->getPost('delete');
                $statusModel->delete($idStatus);
            }

            return $this->redirect('../status');
        }
    }

?>