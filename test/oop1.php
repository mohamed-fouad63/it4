<?php


class MyClass {
    private $data1;

    public static function method1($data) {
        $instance = new self();
        $instance->data1 = preg_replace('/\*/', 'n', $data);
        return $instance;
    }

    public function get() {
        // $callback($this->data);
        // function($data) {
            //  echo preg_replace('/\*/', 'n', $this->data);
            echo $this->data1; // Outputs: Hello World
        // }
    }
}

// Usage
MyClass::method1('Hello      *   m      ***     World')->get();