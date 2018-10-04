<?php

function public_helper($string = '') {
    return base_url('public/' . $string);
}

function admin_url($string = '') {
    return base_url('/' . $string);
}

function user_url($string = '') {
    return base_url('user/' . $string);
}

?>