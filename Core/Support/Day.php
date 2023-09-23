<?php
namespace Core\Support;

class Day {
    private $timestamp;
    private $dayName;
    static $days = array(
    'en' => array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
    'ar' => array('الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت')
);
    public function __construct($timestamp) {
        self::validateTimestamp($timestamp);
        $this->timestamp = $timestamp;
    }

    public static function validateTimestamp($timestamp) {
        $dateTime = \DateTime::createFromFormat('Y-m-d', $timestamp);
        if (!$dateTime || $dateTime->format('Y-m-d') !== $timestamp) {
            throw new \InvalidArgumentException('Invalid timestamp');
        }
    }

public static function getTypeTimestamp($value) {
    $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $value);
    $time = \DateTime::createFromFormat('H:i:s', $value);
    $date = \DateTime::createFromFormat('Y-m-d', $value);

    if ($dateTime instanceof \DateTime) {
        // Value is a valid datetime string
        return 'dateTime';
    } elseif ($time instanceof \DateTime) {
        // Value is a valid time string
        return 'time';
    } elseif ($date instanceof \DateTime) {
        // Value is a valid date string
        return 'date';
    } elseif (is_numeric($value) && (string)(int)$value === $value && $value <= PHP_INT_MAX && $value >= ~PHP_INT_MAX) {
        // Value is a valid timestamp
        return 'timestamp';
    }

    // Value is neither a timestamp, nor a date, nor a time, nor a datetime string
    return throw new \InvalidArgumentException('Invalid timestamp');;
}
    public static function getDayName($timestamp, $language = 'ar') {
        self::validateTimestamp($timestamp);

        if (!array_key_exists($language, self::$days)) {

            throw new \InvalidArgumentException('Invalid language');
        }
        $dateTime = \DateTime::createFromFormat('Y-m-d', $timestamp);
        $dayOfWeek = $dateTime->format('w');
        
        $instance = new self($timestamp);
        $instance->dayName = self::$days[$language][$dayOfWeek];
        return $instance;
    }
    
    public function not($exceptions) {
        if (!is_array($exceptions)) {
            throw new \InvalidArgumentException('Exceptions must be an array');
        }
        
        if (!in_array($this->dayName, $exceptions)) {
            return $this;
        } else {
            return NULL;
        }
        
    }

    public function in($exceptions) {
        if (!is_array($exceptions)) {
            throw new \InvalidArgumentException('Exceptions must be an array');
        }
        
        if (in_array($this->dayName, $exceptions)) {
            return $this;
        } else {
            return NULL;
        }
        
    }
    
    public function __toString() {
        return $this->dayName;
    }

}

// $timestamp = '2023-09-23'; // الوقت الحالي
// // $dayName = Day::getDayName($timestamp, 'ar');
// $dayNameIN = Day::getDayName($timestamp, 'ar')->in(['الجمعة','السبت']);
// // $dayNameNot = Day::getDayName($timestamp, 'ar')->not(['الجمعة','السبت']);
// // echo $dayNameNot;
// echo '<pre> dayNameIN';
// echo $dayNameIN;
// echo '<pre> dayNameNot';
// echo $dayNameNot;
// echo '<pre>';
// print_r(new Day('2023-09-23'));
// // echo $t;