<?php

namespace DrupalSeven;

/**
 * Traits common to DrupalSeven\TestCase class.
 */
trait Common {
  use Menu;

  /**
   * This is replaced in the Fixtures trait.
   */
  public function setUpFixtures() {
  }

  /**
   * This is exposed for subclasses of TestCase.
   */
  public function setUpAfter() {
  }

  /**
   * This is replaced by the Bootstrapped trait.
   */
  public static function setUpBeforeClass() {
  }

  /**
   * Set the sage for the Fixtures trait.
   */
  public function setUp() {
    $this->setUpFixtures();
    $this->setUpAfter();
  }

  /**
   * An assertion for testing some basic module functionality.
   */
  public static function assertModuleImplementsHook($module, $hook, $message = '') {
    static::assertThat($module, static::moduleImplementsHookConstraint($hook), $message);
  }

  /**
   * Construct a constraint using the pattern recommended by PHPUnit.
   */
  public static function moduleImplementsHookConstraint($hook) {
    return new ModuleImplementsHookConstraint($hook);
  }

}
