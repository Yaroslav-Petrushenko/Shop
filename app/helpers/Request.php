<?php
    namespace app\helpers;

    class Request 
    {
        public function checkUserRegisterForm(array $formData)
        {
            $errors = [];

            foreach ($formData as $key => $item) {
                if (empty($item)) {
                    $errors[$key]['desc'] = 'This items is required';
                    $errors[$key]['check'] = true;
                }
            }
            return $errors;
        }
    }


?>