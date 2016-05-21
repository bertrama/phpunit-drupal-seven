<?php
namespace DrupalSeven;

class ModuleImplementsHookConstraint extends \PHPUnit_Framework_Constraint {
  public function __construct($hook) {
    $this->hook = $hook;
    parent::__construct();
  }

  public function matches($module) {
    return function_exists("{$module}_{$this->hook}");
  }

  public function toString() {
    return "implements hook_{$this->hook}()";
  }
}
