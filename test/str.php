<?php
$str = 'Hello 😊     ';

echo strlen($str);        // Outputs: 10
echo mb_strlen($str);     // Outputs: 8
?>