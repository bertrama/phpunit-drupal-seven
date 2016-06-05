<?php

namespace DrupalSeven;

/**
 * Make the class tell PHPUnit to run in a separate process.
 */
trait Isolated {

  /**
   * Have the constructor declare the tests should be run in separate processes.
   */
  public function __construct($name = NULL, array $data = array(), $dataName = '') {
    $this->setRunTestInSeparateProcess(TRUE);
    parent::__construct($name, $data, $dataName);
  }

}
