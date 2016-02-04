<?php
require_once "../src/simple_perceptron.php";

class SimplePerceptronTest extends PHPUnit_Framework_TestCase
{
   public function test_index()
   {
      // normal
      list($ret, $val) = Calc_recognition([1,1,-1], [2, 0, 1], 1);
      $this->assertEquals(1, $ret);
      $this->assertEquals(1, $val);

      // error
      // data count error
      list($ret, $val) = Calc_recognition([1,1,-1], [2, 0], 1);
      $this->assertEquals(-1, $val);

      // null error
      list($ret, $val) = Calc_recognition([1,1,-1], [], 0);
      $this->assertEquals(-1, $val);

   }
}
