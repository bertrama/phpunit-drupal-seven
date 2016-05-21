<?php
namespace DrupalSeven;

trait Menu {

  public function assertValidMenu($menu, $message = '') {
    static::assertThat($menu, static::isValidMenuConstraint(), $message);
  }

  public static function isValidMenuConstraint() {
    return new IsValidMenuConstraint();
  }

  public function assertModuleImplementsHookMenu($module, $message = '') {
    $this->assertModuleImplementsHook($module, 'menu', $message);
  }
}
