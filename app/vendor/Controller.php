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

        public function getPost(string $key = null)
        {

            $result = [];

            if (isset($_POST)) {
                $result = $_POST;
                if (!is_null($key)) {
                    if (!empty($_POST[$key]) && isset($_POST[$key])) {
                        $result = $_POST[$key];
                    } elseif (isset($_POST[$key])){
                        $result = 'Error undefind key' . $key;
                    }

                }
            }

            return $result;
        }
        public function redirect(string $url)
        {
            // хедер локейшн виконується зразу, тобто якщо будуть певірки якісь то виконається зразу локейш
            header('Location: ' .$url);
            exit;
        }
    }

?>