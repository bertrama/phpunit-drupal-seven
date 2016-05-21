<?php

namespace DrupalSeven;

trait Isolated {
  public function __construct($name = null, array $data = array(), $dataName = '') {
    $this->setRunTestInSeparateProcess(true);
    parent::__construct($name, $data, $dataName);
  }
}
