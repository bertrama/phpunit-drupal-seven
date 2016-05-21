<?php

namespace DrupalSeven;

trait Common {
  use Menu;

  public static function assertModuleImplementsHook($module, $hook, $message = '') {
    static::assertThat($module, static::ModuleImplementsHookConstraint($hook), $message);
  }

  public static function ModuleImplementsHookConstraint($hook) {
    return new ModuleImplementsHookConstraint($hook);
  }

}
