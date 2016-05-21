# phpunit-drupal-seven
Experimental work on this stuff.

Starting with ideas posted on [Lullabot](https://www.lullabot.com/articles/write-unit-tests-for-your-drupal-7-code-part-1).

# Installing with composer

Sample `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/bertrama/phpunit-drupal-seven"
    }
  ],
  "require": {
    "bertrama/phpunit-drupal-seven": "*"
  },
  "autoload": {
    "classmap": ["includes/", "modules/", "sites/all/modules/"]
  },
  "psr-0": {
    "Drupal\\Component\\": "lib/",
    "Symfony\\": ["DRUPAL_CONTRIB<service_container>/lib"]
  },
  "psr-4": {
    "Drupal\\typed_entity\\": "../src/",
    "Drupal\\service_container\\": ["DRUPAL_CONTRIB<service_container>/src"]
  },
  "class-location": {
    "\\DrupalCacheInterface": "DRUPAL_ROOT/includes/cache.inc",
    "\\ServiceContainer": "DRUPAL_CONTRIB<service_container>/lib/ServiceContainer.php"
  }
}
```

Install with `composer install`. Run with `composer exec drunit`


```bash
% composer install
% composer exec drunit
```

# Writing tests

Default is to look for tests in `./tests`

```php
<?php
class MyTest extends DrupalSeven\TestCase {
  // For tests that need to have access to drupal's APIs and/or database.
  use DrupalSeven\Bootstrapped;

  // For tests that need to run in isolation (e.g. for tests that changes global state)
  use DrupalSeven\Isolated;

  public function testHookMenu() {
    $this->assertModuleImplementsHookMenu('my_module');
  }

}
```
