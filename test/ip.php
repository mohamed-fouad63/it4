<?php
function validateIpAddress($ipAddress) {
    $pattern = '/^(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])\.(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])\.(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])\.(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])$/';
    // $pattern = '/^
    // (
    // 0\d{2}  // from 0\00 to 0\99
    // |
    // [1-9]\d?  // from 1 to 99
    // |
    // 1\d{2}   // from 100 to 199
    // |
    // 2[0-4]\d // from 20\0 to 24\9
    // |
    // 25[0-5]  // from 250 to 255
    // )$/';
    if (preg_match($pattern, $ipAddress)) {
        return true;
    }

    return false;
}

// Test the validation function
$ip1 = '010.219.32.255';
$ip2 = '10.010.1.10';

if (validateIpAddress($ip1)) {
    echo "Valid IP address: " . $ip1;
} else {
    echo "Invalid IP address: " . $ip1;
}

echo "<br>";

if (validateIpAddress($ip2)) {
    echo "Valid IP address: " . $ip2;
} else {
    echo "Invalid IP address: " . $ip2;
}