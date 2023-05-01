<?php
    namespace app\vendor;

    class Controller
    {
        public function __construct()
        {
            session_start();
        }

        public function view($viewName, $data = [])
        {
            $viewPath = 'app/resource/views/'.$viewName.'.php';
            if (file_exists($viewPath)) {
                // var_dump($viewPath);
                extract($data, EXTR_OVERWRITE);
                include $viewPath;
            }
        }

        // protected function render(string $template, array $data = [])
        // {
        //     require_once 'app/resource/views/'.$template.'.php';
        // }

        public function getPost($key = '')
        {

            $result = [];

            if (isset($_POST)) {
                if (!empty($_POST[$key])) {
                    $result = $_POST[$key];
                }
                $result = $_POST;
            }

            return $result;
        }
    }

?>