<?php

function render_input($name, $label = '', $value = '', $type = 'text', $input_attrs = [], $form_group_attr = [], $form_group_class = '', $input_class = '')
{
    $input            = '';
    $_form_group_attr = '';
    $_input_attrs     = '';
    foreach ($input_attrs as $key => $val) {
        // tooltips
        if ($key == 'title') {
            $val = ($val);
        }
        $_input_attrs .= $key . '=' . '"' . $val . '" ';
    }

    $_input_attrs = rtrim($_input_attrs);

    $form_group_attr['app-field-wrapper'] = $name;

    foreach ($form_group_attr as $key => $val) {
        // tooltips
        if ($key == 'title') {
            $val = ($val);
        }
        $_form_group_attr .= $key . '=' . '"' . $val . '" ';
    }

    $_form_group_attr = rtrim($_form_group_attr);

    if (!empty($form_group_class)) {
        $form_group_class = ' ' . $form_group_class;
    }
    if (!empty($input_class)) {
        $input_class = ' ' . $input_class;
    }
    $input .= '<div class="form-group label-floating' . $form_group_class . '" ' . $_form_group_attr . '>';
    if ($label != '') {
        $input .= '<label for="" class="control-label">' . $label . '</label>';
    }
    $input .= '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" class="form-control' . $input_class . '" ' . $_input_attrs . ' value="' . set_value($name, $value) . '">';
    $input .= '</div>';

    return $input;
}
function render_select($name, $options, $option_attrs = [], $label = '', $selected = '', $select_attrs = [], $form_group_attr = [], $form_group_class = '', $select_class = '', $include_blank = true)
{
    $callback_translate = '';
    if (isset($options['callback_translate'])) {
        $callback_translate = $options['callback_translate'];
        unset($options['callback_translate']);
    }
    $select           = '';
    $_form_group_attr = '';
    $_select_attrs    = '';
    if (!isset($select_attrs['data-width'])) {
        $select_attrs['data-width'] = '100%';
    }
    if (!isset($select_attrs['data-none-selected-text'])) {
        $select_attrs['data-none-selected-text'] = ('dropdown_non_selected_tex');
    }
    foreach ($select_attrs as $key => $val) {
        // tooltips
        if ($key == 'title') {
            $val = ($val);
        }
        $_select_attrs .= $key . '=' . '"' . $val . '" ';
    }

    $_select_attrs = rtrim($_select_attrs);

    $form_group_attr['app-field-wrapper'] = $name;
    foreach ($form_group_attr as $key => $val) {
        // tooltips
        if ($key == 'title') {
            $val = ($val);
        }
        $_form_group_attr .= $key . '=' . '"' . $val . '" ';
    }
    $_form_group_attr = rtrim($_form_group_attr);
    if (!empty($select_class)) {
        $select_class = ' ' . $select_class;
    }
    if (!empty($form_group_class)) {
        $form_group_class = ' ' . $form_group_class;
    }
    $select .= '<div class="select-placeholder form-group' . $form_group_class . '" ' . $_form_group_attr . '>';
    if ($label != '') {
        $select .= '<label for="' . $name . '" class="control-label">' . $label . '</label>';
    }
    $select .= '<select id="' . $name . '" name="' . $name . '" class="selectpicker' . $select_class . '" ' . $_select_attrs . ' data-live-search="true">';
    if ($include_blank == true) {
        $select .= '<option value=""></option>';
    }
    foreach ($options as $option) {
        $val       = '';
        $_selected = '';
        $key       = '';
        if (isset($option[$option_attrs[0]]) && !empty($option[$option_attrs[0]])) {
            $key = $option[$option_attrs[0]];
        }
        if (!is_array($option_attrs[1])) {
            $val = $option[$option_attrs[1]];
        } else {
            foreach ($option_attrs[1] as $_val) {
                $val .= $option[$_val] . ' ';
            }
        }
        $val = trim($val);

        if ($callback_translate != '') {
            if (function_exists($callback_translate) && is_callable($callback_translate)) {
                $val = call_user_func($callback_translate, $key);
            }
        }

        $data_sub_text = '';
        if (!is_array($selected)) {
            if ($selected != '') {
                if ($selected == $key) {
                    $_selected = ' selected';
                }
            }
        } else {
            foreach ($selected as $id) {
                if ($key == $id) {
                    $_selected = ' selected';
                }
            }
        }
        if (isset($option_attrs[2])) {
            if (strpos($option_attrs[2], ',') !== false) {
                $sub_text = '';
                $_temp    = explode(',', $option_attrs[2]);
                foreach ($_temp as $t) {
                    if (isset($option[$t])) {
                        $sub_text .= $option[$t] . ' ';
                    }
                }
            } else {
                if (isset($option[$option_attrs[2]])) {
                    $sub_text = $option[$option_attrs[2]];
                } else {
                    $sub_text = $option_attrs[2];
                }
            }
            $data_sub_text = ' data-subtext=' . '"' . $sub_text . '"';
        }
        $data_content = '';
        if (isset($option['option_attributes'])) {
            foreach ($option['option_attributes'] as $_opt_attr_key => $_opt_attr_val) {
                $data_content .= $_opt_attr_key . '=' . '"' . $_opt_attr_val . '"';
            }
            if ($data_content != '') {
                $data_content = ' ' . $data_content;
            }
        }
        $select .= '<option value="' . $key . '"' . $_selected . $data_content . $data_sub_text . '>' . $val . '</option>';
    }
    $select .= '</select>';
    $select .= '</div>';

    return $select;
}
function clear_textarea_breaks($text, $replace = '')
{
    $breaks = [
        '<br />',
        '<br>',
        '<br/>',
    ];

    $text = str_ireplace($breaks, $replace, $text);
    $text = trim($text);

    return $text;
}
function render_textarea($name, $label = '', $value = '', $textarea_attrs = [], $form_group_attr = [], $form_group_class = '', $textarea_class = '')
{
    $textarea         = '';
    $_form_group_attr = '';
    $_textarea_attrs  = '';
    if (!isset($textarea_attrs['rows'])) {
        $textarea_attrs['rows'] = 4;
    }

    if (isset($textarea_attrs['class'])) {
        $textarea_class .= ' ' . $textarea_attrs['class'];
        unset($textarea_attrs['class']);
    }

    foreach ($textarea_attrs as $key => $val) {
        // tooltips
        if ($key == 'title') {
            $val = ($val);
        }
        $_textarea_attrs .= $key . '=' . '"' . $val . '" ';
    }

    $_textarea_attrs = rtrim($_textarea_attrs);

    $form_group_attr['app-field-wrapper'] = $name;

    foreach ($form_group_attr as $key => $val) {
        if ($key == 'title') {
            $val = ($val);
        }
        $_form_group_attr .= $key . '=' . '"' . $val . '" ';
    }

    $_form_group_attr = rtrim($_form_group_attr);

    if (!empty($textarea_class)) {
        $textarea_class = trim($textarea_class);
        $textarea_class = ' ' . $textarea_class;
    }
    if (!empty($form_group_class)) {
        $form_group_class = ' ' . $form_group_class;
    }
    $textarea .= '<div class="form-group' . $form_group_class . '" ' . $_form_group_attr . '>';
    if ($label != '') {
        $textarea .= '<label for="' . $name . '" class="control-label">' . $label . '</label>';
    }

    $v = clear_textarea_breaks($value);
    if (strpos($textarea_class, 'tinymce') !== false) {
        $v = $value;
    }
    $textarea .= '<textarea id="' . $name . '" name="' . $name . '" class="form-control' . $textarea_class . '" ' . $_textarea_attrs . '>' . set_value($name, $v) . '</textarea>';

    $textarea .= '</div>';

    return $textarea;
}

