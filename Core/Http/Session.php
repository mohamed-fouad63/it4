<?php
namespace Core\Http;

class Session {
    private $sessionData;
    private $csrfToken;

    public function __construct() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            $this->deleteOldSessions(14400);
            session_set_cookie_params(14400, '/it4/', $_SERVER['HTTP_HOST'], false, true);
            session_save_path(dirname(realpath(__FILE__)) . '/../session_save_path');
            session_start();
        }

        $this->sessionData = $_SESSION;
        $this->csrfToken = $this->sessionData['_token'] ?? null;
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
        $_SESSION['_token'] = $this->csrfToken;

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
    public function destroy() {
        // session_start();
        // remov all session variables
          session_unset();
          // destroy the session 
          session_destroy();
    }
}