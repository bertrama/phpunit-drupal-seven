<?php

namespace DrupalSeven;

/**
 * Provide functions for bootstrapping Drupal 7 in a DrupalSeven\TestCase.
 */
trait Bootstrapped {

  /**
   * Sets up some basic global variables for Drupal 7's bootstrap.
   */
  public static function setUpGlobals() {
    // @codingStandardsIgnoreStart
    $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
    // @codingStandardsIgnoreEnd
    $_SERVER['REQUEST_METHOD'] = 'GET';
  }

  /**
   * Bootstraps Drupal 7.
   */
  public static function setUpBeforeClass() {
    global $conf, $user, $language;
    static::setUpGlobals();

    if (!defined('DRUPAL_ROOT')) {
      define('DRUPAL_ROOT', getcwd());
      require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
      drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
    }
  }

}
