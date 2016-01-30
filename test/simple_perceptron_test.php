<?php
require_once "../src/simple_perceptron.php";

class SimplePerceptronTest extends PHPUnit_Framework_TestCase {

   public function test_index() {
      // 正常系
      list($ret, $val) = Calc_recognition([1,1,-1], [2, 0, 1], 1);
      $this->assertEquals(1, $ret);
      $this->assertEquals(1, $val);

      // 異常系
      // 個数エラー
      list($ret, $val) = Calc_recognition([1,1,-1], [2, 0], 1);
      $this->assertEquals(-1, $val);

      // nullエラー
      list($ret, $val) = Calc_recognition([1,1,-1], [], 0);
      $this->assertEquals(-1, $val);

   }
}
