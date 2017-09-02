<?php 

function is_blank($value) {
    return !isset($value) || trim($value) === '';
}

function has_length_greater_than($value, $min) {
    return strlen($value) > $min;
}

function has_length_less_than($value, $max) {
    return strlen($value) < $max;
}

function is_valid_email($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
}

?>