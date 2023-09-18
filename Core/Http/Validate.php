<?php
namespace Core\Http;

class Validate
{
    private $formData = [];
    private $formError = [];
    private $rulesList = [
        'required' => true,
        'numeric' => true,
        'integer' => true,
        'max' => true,
        'min' => true,
        'date' => true,
        'time' => true,
        'barcode' => true,
        'ip' => true,
    ];

    private function processInput(array $inputs, array $formData)
    {
        foreach ($formData as $inputName => $rules) {
            if (!isset($inputs[$inputName])) {
                $inputs[$inputName] = '';
            }
            $inputValue = $this->sanitizeInput($inputs[$inputName]);
            if (is_array($rules)) {
                foreach ($rules as $rule) {
                    $ruleArg = '';
                    if (strpos($rule, ':') !== false) {
                        [$rule, $ruleArg] = explode(':', $rule, 2);
                    }
                    if (isset($this->rulesList[$rule])) {
                        $this->{$rule}($inputValue, $inputName, $ruleArg);
                    } else {
                        $this->setFormData($inputName, $inputValue);
                    }
                }
            }
        }
    }

    private function sanitizeInput($inputValue)
    {
        if (is_array($inputValue)) {
            foreach ($inputValue as &$value) {
                $value = $this->sanitizeInput($value);
            }
            unset($value);
            return $inputValue;
        } else {
            return filter_var($inputValue, FILTER_SANITIZE_STRING);
        }
    }
    public static function post($formData)
    {
        if (is_array($formData)) {
            $inputs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $instance = new self();
            $instance->processInput($inputs, $formData);
            return $instance;
        } else {
            return null;
        }
    }

    public static function get($formData)
    {
        if (is_array($formData)) {
            $inputs = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $instance = new self();
            $instance->processInput($inputs, $formData);
            return $instance;
        } else {
            return null;
        }
    }

    public function isValid()
    {
        return count($this->formError) === 0;
    }

    public function all(string $dataFormate = 'array')
    {
        if ($this->isValid()) {
            return $this->dataFormate($this->formData,$dataFormate);
        } else {
            return $this->dataFormate($this->formError,$dataFormate);
        }
    }
    private function required($inputValue, $inputName)
    {
        if (!empty($inputValue)  && strlen(trim($inputValue)) > 0) {
            $this->setFormData($inputName, $inputValue);
        } else {
            $this->formError[$inputName]['required'] = "هذا الحقل مطلوب";
            $this->formError[$inputName]['value'] = $inputValue;
        }
    }
    private function ip($inputValue, $inputName)
    {
        $pattern = '/^(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])\.(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])\.(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])\.(0\d{2}|[1-9]\d?|1\d{2}|2[0-4]\d|25[0-5])$/';
        if (!empty($inputValue)) {
            if(preg_match($pattern, $inputValue)) {
                $this->setFormData($inputName, $inputValue);
            } else {
                $this->formError[$inputName]['ip'] = "يجب ادخال IP";
            };
        } else {
            $this->setFormData($inputName, $inputValue);
        }
    }
    private function numeric($inputValue, $inputName)
    {
        if (is_numeric($inputValue)) {
            $this->setFormData($inputName, $inputValue);
        } else {
            $this->formError[$inputName]['numeric'] = 'هذا الحقل يتطلب أرقام او كسور';
        }
    }

    private function integer($inputValue, $inputName, $ruleArg)
    {
        if (filter_var($inputValue, FILTER_VALIDATE_INT) || $inputValue == 0) {
            $this->setFormData($inputName, $inputValue);
        } else {
            $this->formError[$inputName]['int'] = 'هذا الحقل يتطلب أرقام صحيحه بدون كسور';
            $this->formError[$inputName]['value'] = $inputValue;
        }
    }

    private function min($inputValue, $inputName, $ruleArg)
    {
        if (is_numeric($ruleArg)) {
            $ruleArg = intval($ruleArg);
            if (mb_strlen($inputValue) >= $ruleArg) {
                $this->setFormData($inputName, $inputValue);
            } else {
                $this->formError[$inputName]['min'] = 'الحد الادنى لعدد الحروف هو (' . $ruleArg . ') احرف';
            }
        } else {
            $this->formError[$inputName]['min'] = 'حدث خطأ فى تحديد عدد الاحرف';
        }
    }

    private function max($inputValue, $inputName, $ruleArg)
    {
        if (is_numeric($ruleArg)) {
            $ruleArg = intval($ruleArg);
            if (mb_strlen($inputValue) <= $ruleArg) {
                $this->setFormData($inputName, $inputValue);
            } else {
                $this->formError[$inputName]['max'] = 'الحد الاقصى لعدد الحروف هو (' . $ruleArg . ') احرف';
            }
        } else {
            $this->formError[$inputName]['max'] = 'حدث خطأ فى تحديد عدد الاحرف';
        }
    }

    private function date($inputValue, $inputName, $ruleArg)
    {
        switch ($ruleArg) {
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
                $ruleArg = 'Y-m-d';
                $datePattern = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/';  // Regular expression pattern for valid 24-hour time format (HH:MM:SS)
                break;
        }
        if (preg_match($datePattern, $inputValue)) {
            $this->setFormData($inputName, $inputValue);
        } else {
            $this->formError[$inputName]['date'] = 'هذا الحقل يجب أن يكون بتنسيق ' . $ruleArg;
        }
    }

    private function time($inputValue, $inputName, $ruleArg)
    {
        switch ($ruleArg) {
            case '12h':
                $timePattern = '/^(0[1-9]|1[0-2]):[0-5][0-9] (AM|PM)$/';  // Regular expression pattern for valid 12-hour time format (hh:mm:ss AM/PM)
                break;
            case '24h':
                $timePattern = '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/';  // Regular expression pattern for valid 24-hour time format (HH:MM:SS)
                break;
            default:
                $ruleArg = '24h';
                $timePattern = '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/';  // Regular expression pattern for valid 24-hour time format (HH:MM:SS)
                break;
        }
        if (preg_match($timePattern, $inputValue)) {
            $this->setFormData($inputName, $inputValue);
        } else {
            $this->formError[$inputName]['time'] = 'هذا الحقل يجب أن يكون بتنسيق ' . $ruleArg;
        }
    }

    private function barcode($inputValue, $inputName, $ruleArg)
    {
        $regex = '/^[A-Z]{2}\d{9}[A-Z]{2}$/';
        if (preg_match($regex, $inputValue)) {
            $this->setFormData($inputName, $inputValue);
        } else {
            $this->formError[$inputName]['barcode'] = 'الباركود غير متوافق';
            $this->formError[$inputName]['value'] = $inputValue;
        }
    }

    public function destroy()
    {
        $this->formData = [];
        $this->formError = [];
    }

    public function dataFormate($data ,$dataType)
    {
        switch ($dataType) {
            case 'json':
                return json_encode($data, JSON_UNESCAPED_UNICODE);
            case 'array':
                return $data;
        }
    }

    private function setFormData($inputName, $inputValue)
    {
        if (is_array($inputValue)) {
            foreach ($inputValue as $key => $value) {
                $inputValue[$key] = $this->sanitizeInput($value);
            }
            $this->formData[$inputName] = $inputValue;
        } else {
            $this->formData[$inputName] = $this->sanitizeInput($inputValue);
        }
    }
    public function __get($property)
    {
        if (array_key_exists($property, $this->formData)) {
            return $this->formData[$property];
        } else {
            return false;
        }
    }
    public function __set($property , $value)
    {
        if (!array_key_exists($property, $this->formData)) {
            $this->formData[$property] = $value;
        } else {
            return false;
        }
    }
}