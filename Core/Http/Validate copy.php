<?php

namespace Core\Http;

class Validate
{
    // private $formData1 = [];

    // private $mo = true;
    public static $formData = [];
    public static $formError = [];
    private static $rulesList = [
        'required' => true,
        'numeric' => true,
        'int' => true,
        'max' => true,
        'min' => true,
        'date' => true,
        'time' => true,
        'barcode' => true,
    ];

    // public function __construct(){
    //     // echo "mo";
    // }

    private static function processInput(array $inputs, array $formData)
{
    foreach ($formData as $inputName => $rules) {
        if (!isset($inputs[$inputName])) {
            $inputs[$inputName] = '';
        }
        $inputValue = self::sanitizeInput($inputs[$inputName]);
        if (is_array($rules)) {
            foreach ($rules as $rule) {
                $rulArg = '';
                if (strpos($rule, ':') !== false) {
                    [$rule, $rulArg] = explode(':', $rule, 2);
                }
                if (isset(self::$rulesList[$rule])) {
                    self::$rule($inputValue, $inputName, $rulArg);
                } else {
                    self::setFormData($inputName, $inputValue);
                }
            }
        }
    }
}
    public static function post($formData)
    {
        if (is_array($formData)) {
            $inputs = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            self::processInput($inputs, $formData);
        }
        return new self();
    }
    public static function get($formData)
    {
        if (is_array($formData)) {
            $inputs = filter_var_array($_GET, FILTER_SANITIZE_STRING);
            self::processInput($inputs, $formData);
        }
        $instance = new self();
        return $instance;
    }
    public function isValid()
    {
        if (count(self::$formError) > 0) {
            return false;
        } else {
            return true;
        }
    }
    public function getData()
    {
        if ($this->isValid()) {
            return self::$formData;
        } else {
            return self::$formError;
        }
    }
    private static function sanitizeInput($inputValue)
    {
        if (is_array($inputValue)) {
            foreach ($inputValue as &$value) {
                $value = self::sanitizeInput($value);
            }
            unset($value); // Unset the reference to avoid potential bugs
            return $inputValue;
        } else {
            return preg_replace('/\s+/', ' ', $inputValue);
        }
    }
    private static function required($inputValue, $inputName)
    {
        if (!empty($inputValue)) {
            self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['required'] = "هذا الحقل مطلوب";
        }
    }
    private static function numeric($inputValue, $inputName)
    {
        if (filter_var($inputValue, FILTER_VALIDATE_FLOAT)) {
            self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['numeric'] = 'هذا الحقل يتطلب أرقام او كسور';
        }
    }
    private static function int($inputValue, $inputName, $rulArg)
    {
        if (filter_var($inputValue, FILTER_VALIDATE_INT)) {

            self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['int'] = 'هذا الحقل يتطلب أرقام صحيحه بدون كسور';
        }
    }
    private static function min($inputValue, $inputName, $rulArg)
    {
        if (is_numeric($rulArg)) {
            $rulArg = intval($rulArg);
        $options = array(
            'options' => array(
                'min_range' => $rulArg,
                'max_range' => PHP_INT_MAX
            )
        );
        
        if(filter_var(strlen($inputValue), FILTER_VALIDATE_INT, $options)){
            self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['min'] = 'الحد الادنى لعدد الحروف هو (' . $rulArg . ') احرف';
        }
    } else {
        self::$formError[$inputName]['min'] = 'حدث خطأ فى تحديد عدد الاحرف';
    }
    }
    private static function max($inputValue, $inputName, $rulArg)
    {
        if (is_numeric($rulArg)) {
            $rulArg = intval($rulArg);
            $options = array(
                'options' => array(
                    'min_range' => PHP_INT_MAX,
                    'max_range' => $rulArg
                )
            );
            if(filter_var(strlen($inputValue), FILTER_VALIDATE_INT, $options)){
                self::setFormData($inputName, $inputValue);
            } else {
                self::$formError[$inputName]['max'] = 'الحد الاقصى لعدد الحروف هو (' . $rulArg . ') احرف';
            }
        } else {
            self::$formError[$inputName]['max'] = 'حدث خطأ فى تحديد عدد الاحرف';
        }
    }

    private static function date($inputValue, $inputName, $rulArg)
    {
        switch ($rulArg) {
            case 'Y-m-d':
            case 'y-m-d':
                $datePattern = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/'; // Regular expression pattern for valid Y-m-d
                break;
            case 'Y-m':
            case 'y-m':
                $datePattern = '/^\d{4}-(0[1-9]|1[0-2])$/';  // Regular expression pattern for valid Y-m
                break;
            case 'Y':
            case 'y':
                $datePattern = '/^\d{4}$/';  // Regular expression pattern for valid Y
                break;
            default:
            $rulArg = 'Y-m-d';
            $datePattern = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/';  // Regular expression pattern for valid 24-hour time format (HH:MM:SS)
                break;
        }
        if (preg_match($datePattern, $inputValue)) {
            self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['date'] = 'هذا الحقل يجب أن يكون بتنسيق ' . $rulArg;
        }
    }
    private static function time($inputValue, $inputName, $rulArg)
    {
        switch ($rulArg) {
            case '12h':
                $timePattern = '/^(0[1-9]|1[0-2]):[0-5][0-9] (AM|PM)$/';  // Regular expression pattern for valid 12-hour time format (hh:mm:ss AM/PM)
                break;
            case '24h':
                $timePattern = '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/';  // Regular expression pattern for valid 24-hour time format (HH:MM:SS)
                break;
            default:
            $rulArg = '24h';
            $timePattern = '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/';  // Regular expression pattern for valid 24-hour time format (HH:MM:SS)
                break;
        }
        if (preg_match($timePattern, $inputValue)) {
            self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['time'] = 'هذا الحقل يجب أن يكون بتنسيق ' . $rulArg;
        }
    }
    private static function barcode($inputValue, $inputName, $rulArg)
    {
        $regex = '/^[A-Z]{2}\d{9}[A-Z]{2}$/';
        if (preg_match($regex, $inputValue)) {
            self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['barcode'] = 'الباركود غير متوافق';
        }
    }
    public function destroy()
    {
        self::$formData = [];
        self::$formError = [];
    }
    public function getFormError($dataType)
    {
        switch ($dataType) {
            case 'json':
                return json_encode(self::$formError, JSON_UNESCAPED_UNICODE);
            case 'array':
                return self::$formError;
        }
    }
    public function setFormError($dataType)
    {
        switch ($dataType) {
            case 'json':
                return json_encode(self::$formError, JSON_UNESCAPED_UNICODE);
            case 'array':
                return self::$formError;
        }
    }
    public function getFormData($dataType)
    {
        switch ($dataType) {
            case 'json':
                return json_encode(self::$formError, JSON_UNESCAPED_UNICODE);
            case 'array':
                return self::$formError;
        }
    }
    public static function setFormData($inputName, $inputValue)
    {
        if (is_array($inputValue)) {
            foreach ($inputValue as $key => $value) {
                $inputValue[$key] = $value;
            }
            self::$formData[$inputName] = $inputValue;
        } else {
            self::$formData[$inputName] = $inputValue;
        }
    }
}
