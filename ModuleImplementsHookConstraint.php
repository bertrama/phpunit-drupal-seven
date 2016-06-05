<?php
namespace DrupalSeven;

/**
 * A generic module implements hook constraint.
 */
class ModuleImplementsHookConstraint extends \PHPUnit_Framework_Constraint {

  /**
   * {@inheritdoc}
   */
  public function __construct($hook) {
    $this->hook = $hook;
    parent::__construct();
  }

  /**
   * {@inheritdoc}
   */
  public function matches($module) {
    return function_exists("{$module}_{$this->hook}");
  }

  /**
   * {@inheritdoc}
   */
  public function toString() {
    return "implements hook_{$this->hook}()";
  }

}
