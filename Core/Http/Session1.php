<?php

namespace Core\Http;

class Session
{
  private $session_name = 'session_name';
  private $session_max_lifetime = 0;
  private $https_only = true;
  private $httponly = true;

  public function __construct()
  {
    $this->setSessionOptions();
    session_start();
  }

  private function setSessionOptions()
  {
    session_name($this->session_name);
    session_set_cookie_params(
      $this->session_max_lifetime,
      '/',
      $_SERVER['HTTP_HOST'],
      $this->https_only,
      $this->httponly
    );
    session_save_path(dirname(realpath(__FILE__)) . '/../session_save_path');

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