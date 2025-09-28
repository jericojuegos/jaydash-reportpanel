<?php
namespace tests\jaydash_reportpanel;

class Basic_TestCase extends \WP_UnitTestCase {
  function test_plugin_function() {
    $this->assertTrue( function_exists( 'jaydash_reportpanel' ) );
  }
}
