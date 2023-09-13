<?php

namespace Core\Http;

use Core\Application;

class Controller
{
    public $db;
    public $issession;
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
    public function __construct()
    {
        $this->issession = Application::$app->session->get('db');
    }
    public static function validate($formData)
    {
        if (is_array($formData)) {
            $inputs = filter_var_array($_POST, FILTER_SANITIZE_STRING);
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
                            // self::$formError[$inputName][$rule] = 'قاعدة التحقق ' . $rule . ' غير موجودة';
                            //self::setFormData($inputName,$inputValue);
                        self::setFormData($inputName, $inputValue);
                        }
                    }
                }
            }
        }
        if (count(self::$formError) > 0) {
             self::$formData = [];
            return false;
        } else {
            return true;
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
    private function required($inputValue, $inputName)
    {
        if (!empty($inputValue)) {
           self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['required'] = "هذا الحقل مطلوب";
        }
    }
    private function numeric($inputValue, $inputName)
    {
        if (filter_var($inputValue, FILTER_VALIDATE_FLOAT)) {
           self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['numeric'] = 'هذا الحقل يتطلب أرقام او كسور';
        }
    }
    private function int($inputValue, $inputName, $rulArg)
    {
        if (filter_var($inputValue, FILTER_VALIDATE_INT)) {

           self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['int'] = 'هذا الحقل يتطلب أرقام صحيحه بدون كسور';
        }
    }
    private function max($inputValue, $inputName, $rulArg)
    {
        if (is_numeric($rulArg)) {
            $rulArg = intval($rulArg);
            if (strlen($inputValue) <= $rulArg) {
               self::setFormData($inputName, $inputValue);
            } else {
                self::$formError[$inputName]['max'] = 'الحد الاقصى لعدد الحروف هو (' . $rulArg . ') احرف';
            }
        } else {
            self::$formError[$inputName]['max'] = 'يوجد خطأ فى تحديد عدد الاحرف';
        }
    }
    private function min($inputValue, $inputName, $rulArg)
    {
        if (is_numeric($rulArg)) {
            $rulArg = intval($rulArg);
            if (strlen($inputValue) >= $rulArg) {
               self::setFormData($inputName, $inputValue);
            } else {
                self::$formError[$inputName]['min'] = 'الحد الادنى لعدد الحروف هو (' . $rulArg . ') احرف';
            }
        } else {
            self::$formError[$inputName]['min'] = 'يوجد خطأ فى تحديد عدد الاحرف';
        }
    }
    private function date($inputValue, $inputName, $rulArg)
    {
        $rulArg = !$rulArg ? 'Y-m-d' :  $rulArg;
        $date = \DateTime::createFromFormat($rulArg, $inputValue);
        if ($date && $date->format($rulArg) === $inputValue) {
           self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['date'] = 'هذا الحقل يجب أن يكون بتنسيق ' . $rulArg;
        }
    }
    private function time($inputValue, $inputName, $rulArg)
    {
        $date = \DateTime::createFromFormat($inputValue, $inputValue);
        if ($date && $date->format($inputValue) === $inputValue) {
           self::setFormData($inputName, $inputValue);
        } else {
            self::$formError[$inputName]['time'] = 'هذا الحقل يجب أن يكون بتنسيق ' . $rulArg;
        }
    }
    private function barcode($inputValue, $inputName, $rulArg)
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
