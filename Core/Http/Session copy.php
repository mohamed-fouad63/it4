<?php

namespace Core\Http;

class Session {
    private $sessionData;
    private $csrfToken;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
          $this->deleteOldSessions(5);
          session_set_cookie_params(
            0,
            '//',
            $_SERVER['HTTP_HOST'],
            true,
            true
          );
          session_save_path(dirname(realpath(__FILE__)) . '/../session_save_path');
            session_start();
        }
        $this->sessionData = $_SESSION;
        $this->csrfToken = $this->sessionData['csrf_token'] ?? null;
    }
    public function deleteOldSessions($maxLifetime) {
      $sessionPath = session_save_path(dirname(realpath(__FILE__)) . '/../session_save_path');
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
        if (!$this->csrfToken) {
            throw new \Exception("CSRF token not generated. Call generateCsrfToken() first.");
        }
        $_SESSION[$key] = $value;
        $this->sessionData[$key] = $value;
    }

    public function get($key) {
        return $this->sessionData[$key] ?? null;
    }
}