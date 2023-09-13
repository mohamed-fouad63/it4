<?php

namespace Core\Http;

// class Session {
//     private $sessionData;
//     private $csrfToken;

//     public function __construct() {
//         if (session_status() !== PHP_SESSION_ACTIVE) {
//             $this->deleteOldSessions(15);

//             session_set_cookie_params(15, '/it4/', $_SERVER['HTTP_HOST'], true, true);
//             session_save_path(dirname(realpath(__FILE__)) . '/../session_save_path');
//             session_start();
//         }

//         $this->sessionData = $_SESSION;
//         $this->csrfToken = $this->sessionData['csrf_token'] ?? null;
//     }

//     public function deleteOldSessions($maxLifetime) {
//         $sessionPath = dirname(realpath(__FILE__)) . '/../session_save_path';
//         $sessionFiles = glob($sessionPath . '/*');

//         foreach ($sessionFiles as $file) {
//             if (filemtime($file) < time() - $maxLifetime) {
//                 unlink($file);
//             }
//         }
//     }

//     public function generateCsrfToken() {
//         $this->csrfToken = bin2hex(random_bytes(16));
//         $_SESSION['csrf_token'] = $this->csrfToken;

//         return $this->csrfToken;
//     }

//     public function set($key, $value) {
//         if (!$this->csrfToken) {
//             throw new \Exception("CSRF token not generated.");
//         }

//         $_SESSION[$key] = $value;
//         $this->sessionData[$key] = $value;
//     }

//     public function get($key) {
//         if (!$this->csrfToken) {
//             throw new \Exception("CSRF token not generated.");
//         }

//         return $this->sessionData[$key] ?? null;
//     }
// }


namespace Core\Http;

class Session {
    private $sessionData;
    private $csrfToken;

    public function __construct() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            $this->deleteOldSessions(86400);
            session_set_cookie_params(86400, '/it4/', $_SERVER['HTTP_HOST'], false, true);
            session_save_path(dirname(realpath(__FILE__)) . '/../session_save_path');
            session_start();
        }

        $this->sessionData = $_SESSION;
        $this->csrfToken = $this->sessionData['csrf_token'] ?? null;
    }

    public function deleteOldSessions($maxLifetime) {
        $sessionPath = dirname(realpath(__FILE__)) . '/../session_save_path';
        $sessionFiles = glob($sessionPath . '/*');

        foreach ($sessionFiles as $file) {
            if (filemtime($file) < time() - $maxLifetime) {
                unlink($file);
            }
        }
    }

    public function generateCsrfToken() {
        $this->csrfToken = bin2hex(random_bytes(16));
        $_SESSION['csrf_token'] = $this->csrfToken;

        return $this->csrfToken;
    }

    public function set($key, $value) {
        if (!isset($this->csrfToken)) {
            throw new \Exception("CSRF token not generated.");
        }

        $_SESSION[$key] = $value;
        $this->sessionData[$key] = $value;
    }

    public function get($key) {
        if (!isset($this->csrfToken)) {
            return false;
        }
        return $this->sessionData[$key] ?? null;
    }
}