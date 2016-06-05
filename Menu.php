<?php
namespace DrupalSeven;

/**
 * Assertions and helpers for Drupal 7 menu related features.
 */
trait Menu {

  /**
   * An assertion that $menu is valid.
   */
  public function assertValidMenu($menu, $message = '') {
    static::assertThat($menu, static::isValidMenuConstraint(), $message);
  }

  /**
   * Helper to create an IsValidMenuConstraint.
   */
  public static function isValidMenuConstraint() {
    return new IsValidMenuConstraint();
  }

  /**
   * An assertion that $module implements hook_menu().
   */
  public function assertModuleImplementsHookMenu($module, $message = '') {
    $this->assertModuleImplementsHook($module, 'menu', $message);
  }

}
