<?php

$isDangerous = false;
$patterSearch = '/Content-type:|Bcc:|Cc:/i';

foreach ($_POST as $key => $value) {
    $value = is_array($value) ? $value : trim($value);
    if (empty($value) && in_array($key, $requiredFields)) {
        $missing[] = $key;
        $$key = '';
    } elseif (in_array($key, $expectedValues)) {
        $$key = $value;
    }
}
