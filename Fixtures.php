<?php
namespace DrupalSeven;

/**
 * Support for some basic fixtures autoloading.
 */
trait Fixtures {

  /**
   * Autload fixtures based on the class name.
   *
   * Assumes that fixtures are found next to the test class.
   *
   * Example:
   * tests/MyTest.php
   * tests/fixtures/MyTest.php/fixtureName1.txt
   * tests/fixtures/MyTest.php/fixtureName2.txt
   */
  public function setUpFixtures($class_file = NULL) {

    $pattern = $this->fixturePath($class_file) . '/*.txt';

    foreach (glob($pattern) as $file) {
      $property = basename($file, '.txt');
      $this->{$property} = unserialize(file_get_contents($file));
    }
  }

  /**
   * Helper function for creating fixtures.
   *
   * Probably shouldn't be used in actual tests.
   */
  private function saveFixture($name) {
    file_put_contents(
      $this->fixturePath() . '/' . $name . '.txt',
      serialize($this->{$name})
    );
  }

  /**
   * Helper function for figuring out a fixture's path from the name of a class.
   *
   * If no class name is provided, assume get_called_class().
   */
  private function fixturePath($class_file = NULL) {
    if (is_null($class_file)) {
      $class = new \ReflectionClass(get_called_class());
      $class_file = $class->getFileName();
    }

    return dirname($class_file)
      . '/fixtures/'
      . basename($class_file);
  }

}
