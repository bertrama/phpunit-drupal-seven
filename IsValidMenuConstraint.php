<?php
namespace DrupalSeven;

/**
 * A constraint that validates a drupal seven menu definition.
 */
class IsValidMenuConstraint extends \PHPUnit_Framework_Constraint {

  /**
   * {@inheritdoc}
   */
  public function matches($menu) {
    $valid = is_array($menu);
    if ($valid) {
      foreach ($menu as $path => $info) {
        $valid = $valid && mb_strlen($path) > 0;
        $valid = $valid && is_array($info);

        // Title is required.
        if ($valid) {
          $valid = $valid && !empty($info['title']);
          $valid_keys = [
            'title', 'title callback', 'title arguments',
            'description', 'page callback', 'page arguments',
            'delivery callback', 'access callback', 'access arguments',
            'theme callback', 'theme arguments',
            'file', 'file_path', 'load arguments',
            'weight', 'menu_name', 'expanded',
            'context', 'tab_parent', 'tab_root',
            'position', 'type', 'options',
          ];
          $merged_keys = array_unique(array_merge($valid_keys, array_keys($info)));
          $valid = $valid && count($valid_keys) == count($merged_keys);
        }
      }
    }
    return $valid;
  }

  /**
   * {@inheritdoc}
   */
  public function toString() {
    return 'is a valid menu';
  }

}
