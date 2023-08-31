<?php

namespace Core\Http;

class Session
{
  // Set your own random session name here
  private $session_name = 'session_name';
  private $session_max_lifetime = 0; // Session expires when browser is closed
  private $https_only = true; // Only allow session over HTTPS
  private $httponly = true; // Prevents XSS attacks

  public function __construct()
  {
    session_name($this->session_name);
    session_set_cookie_params(
      $this->session_max_lifetime,
      '/it4',
      $_SERVER['HTTP_HOST'],
      $this->https_only,
      $this->httponly
    );
    session_save_path(dirname(realpath(__FILE__)) . '/../session_save_path');
    session_start();
  }

  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get($key)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  public function delete($key)
  {
    unset($_SESSION[$key]);
  }

  public function destroy()
  {
    session_destroy();
  }
}
