<?php

namespace DrupalSeven;

trait  Bootstrapped {

  public function setUp() {
    global $conf, $user, $language;
    if (!defined('DRUPAL_ROOT')) {
      $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
      define('DRUPAL_ROOT', getcwd());
      require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
      drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
    }
  }
}
