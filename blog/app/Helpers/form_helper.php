<?php
if (!function_exists('display_error')) {
    function display_error($field, $class = false)
    {
        $errors = session()->getFlashdata('errors');
        $data = '';
        if ($errors) {
            if (is_array($errors)) {
                foreach ($errors as $key => $error) {
                    if ($key === $field) {
                        $data = $class ? 'is-invalid' : "<div class='invalid-feedback'>$error</div>";
                        break;
                    }
                }
            }
        }
        return $data;
        // if (!isset($validation)) return;
        // if ($class) return $validation->hasError($field) ? 'is-invalid' : '';

        // if ($validation->hasError($field)) {
        //     return '<div class="invalid-feedback">'
        //         . $validation->getError($field) . '</div>';
        // }
    }
}
