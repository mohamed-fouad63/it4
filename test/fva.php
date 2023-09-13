<?php

$data = array(
    'product_id'    => 'libgd<script>',
    'component'     => '   10   ',
    'versions'      => '2.0.33',
    'testscalar'    => array('2', '23', '10', '12'),
    'testarray'     => '2',
);

$args = array(
    'product_id'   => FILTER_SANITIZE_ENCODED,
    'component'    => array('filter'    => FILTER_VALIDATE_INT,
                            'flags'     => FILTER_FORCE_ARRAY, 
                            'options'   => array('min_range' => 1, 'max_range' => 10)
                           ),
    'versions'     => FILTER_SANITIZE_ENCODED,
    'doesnotexist' => FILTER_VALIDATE_INT,
    'testscalar'   => array(
                            'filter' => FILTER_VALIDATE_INT,
                            'flags'  => FILTER_REQUIRE_SCALAR,
                        ),
    'testarray'    => array(
                            'filter' => FILTER_VALIDATE_INT,
                            'flags'  => FILTER_FORCE_ARRAY,
                        )

);

$myinputs = filter_var_array($data, $args);
echo "filter_var_array<pre>";
var_dump($myinputs);
echo "\n";
echo "To apply the same filter to many params/keys, use array_fill_keys().<pre>";
$data2 = array(
    'product_id'    => 'libgd<script>',
    'component'     => '    10    ',
    'versions'      => '2.0.33',
    'testscalar'    => array('2', '23', '10', '12'),
    'testarray'     => '2',
);
$keys2 = array(
    'product_id',
    'component',
    'versions',
    'doesnotexist',
    'testscalar',
    'testarray'
);
$options2 = array(
    'filter' => FILTER_CALLBACK,
    'options' => function ($value) {
        return trim(strip_tags($value));
    },
);
$args2 = array_fill_keys($keys2, $options2);
var_dump($args2);
$myinputs2 = filter_var_array($data2, $args2);
var_dump($myinputs2);
?>