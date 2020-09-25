<?php
function isvalidChar($string)
{
    $chArr = str_split($string);

    foreach ($chArr as $ch) {
        if (
            $ch == '.' || $ch == '_' || $ch == '-' ||
            ($ch >= 'a' && $ch <= 'z') || ($ch >= '0' && $ch <= '9')
        );
        else
            return false;
    }
    return true;
}

//For Prefix or Local Part Validation
function isPrefixValid($email)
{
    $atPos = strrpos($email, "@");
    $prefix = substr($email, 0, $atPos);
    //  echo "Prefix: ".$prefix."<br>";

    if ((strlen($prefix) >= 5 && strlen($prefix) <= 32) && isvalidChar($prefix))
        return true;
    return false;
}

//For Domain Part Validation
function isDomainValid($email)
{
    $atPos = strrpos($email, "@");
    $dotPos = strrpos($email, ".");
    $length = strlen($email);
    $domain = substr($email, $atPos + 1);
    // echo "Domain: ".$domain."<br>";rohit777kanojiya@gmail.com
    if (($length - 1 - $dotPos) >= 2 && ($dotPos - $atPos - 1) >= 3 && isvalidChar($domain))
        return true;
    return false;
}

function validateEmail($email)
{
    if (isPrefixValid($email) && isDomainValid($email))
        return true;
    else
        return false;
}
