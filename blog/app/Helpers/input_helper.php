<?php
if (!function_exists('make_field')) {
    function make_field($name, $options = [], $type = 'text')
    {
        $data = array_key_exists('data', $options) ? $options['data'] : null;
        $classes = display_error($name, true);
        $value = isset($data) ? old($name, $data) : old($name);
        $error = display_error($name);
        $label = ucwords(str_replace('_', ' ', $name));
        $placeholder = array_key_exists('placeholder', $options) ? $options['placeholder'] : "Add $label...";

        if ($type === 'date') {
            $value = date('Y-m-d', strtotime($value ?? date('Y-m-d')));
        }

        $input = "<input name='$name' class='form-control $classes' type='$type' placeholder='$placeholder' value='$value' id='$name' />";
        if ($type === 'textarea') {
            $input = "<textarea name='$name' class='form-control $classes' placeholder='$placeholder' id='$name' >$value</textarea>";
        }
        if ($type === 'switch') {
            $checked = $value == 1 ? "checked='checked'" : "";
            return "<div class='form-check form-switch $classes'>
            <input type='hidden' name='$name' value='0'>
            <input name='$name' class='form-check-input' type='checkbox' id='$name' $checked>
                        <label class='form-check-label' for='$name'>$label</label>
                    </div>";
        }
        return "<div class='mb-3'>
                    <label for='$name'>$label</label>
                    $input
                    $error
                </div>";
    }
}
