<?php
function convertEnglishDigitToBengali($input = '')
{
    $bn_digits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    $output = str_replace(range(0, 9), $bn_digits, $input);

    return $output;
}
?>