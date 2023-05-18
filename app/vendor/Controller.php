<?php
    namespace app\vendor;

    class Controller
    {
        public function __construct()
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        public function view($viewName, $data = [] )
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
            $postData = [];
            if (isset($_POST)) {
                $postData = $_POST;
                if (!is_null($key)) {
                    if (!empty($_POST[$key]) && isset($_POST[$key])) {
                        $postData = $_POST[$key];
                    } elseif (!isset($_POST[$key])) {
                        $postData = null;
                    }
                }
            }
            return $postData;
        }

        public function getGet(string $key = null)
        {
            $postData = [];
            if (isset($_GET)) {
                $postData = $_GET;
                if (!is_null($key)) {
                    if (!empty($_GET[$key]) && isset($_GET[$key])) {
                        $postData = $_GET[$key];
                    } elseif (!isset($_GET[$key])) {
                        $postData = null;
                    }
                }
            }
            return $postData;
        }

        public function getFiles(string $key = null)
        {
            $filesData = [];
            if (isset($_FILES)) {
                $filesData = $_FILES;
                if (!is_null($key)) {
                if (!empty($_FILES[$key]) && isset($_FILES[$key])) {
                    $filesData = $_FILES[$key];
                } elseif (!isset($_FILES[$key])) {
                    $filesData = null;    // 'Error: undefined Files key ' . $key . '.';
                }
                }
            }

            return $filesData;
        }

        public function redirect(string $url) : void
        {
            header('Location: ' .$url);
            exit;
        }

        public function getBaseURL(string $str = '')
        {
            $url = explode('/', $_SERVER['REQUEST_URI']);

            if ($url[1] === 'admin') {
                $url[1] .= '/' . $str;
            }
            return !isset($url[2]) ? $url[1] : $str;
        }

        public function getImage(array $data)
        {
            // "/app/resource/uploads";
            
            return $this->view('templates/image', $data);
        }
    }

?>