<?php
require_once "../src/simple_perceptron.php";

class SimplePerceptronTest extends PHPUnit_Framework_TestCase
{
   /**
    * Preparation of a test data
    *
    */
   public function setUp()
   {
      $this->obj = new simple_perceptron();
      $this->normal_input = [
         [5, 2, 3],
         [4, 4, 5],
         [1, 2, 4],
         [4, 1, 1],
         [2, 1, 5],
     ];

      $this->element_error_input = [
         [5, 2, 3],
         [4, 4, 5],
         [1, 2, 4],
         [4, 1],
         [2, 1, 5],

      ];

      $this->count_error_input = [
         [5, 2, 3],
         [4, 4, 5],
         [],
         [4, 1, 1],
         [2, 1, 5],

      ];

      $this->duplicate_error_input = [
         [1, 2, 3],
         [4, 4, 5],
         [1, 2, 4],
         [4, 1, 1],
         [2, 1, 5],
    ];

      $this->label = [1, 1, -1, -1, 1];
   }

   /**
    * Create test data
    *
    */
   public function test_Create_data()
   {
      list($data, $labels) = $this->obj->Create_data();
      $this->assertCount(5, $data);
      $this->assertCount(3, $data[0]);
      $this->assertCount(5, $labels);
   }

   /**
    * Add parameter 1 for input data
    *
    */
   public function test_Get_data()
   {
      $data = $this->obj->Get_data($this->normal_input[0]);
      $this->assertCount(4, $data);
      $this->assertEquals(1, array_pop($data));
   }

   /**
    * Multiply to vector each other
    *
    */
   public function test_Multiply_vector()
   {
      $ret = $this->obj->Multiply_vector([0, 0, 1], [1, 3, 0]);
      $this->assertEquals(0, $ret);
      $ret = $this->obj->Multiply_vector([1, -1, 2], [3, -2, -1]);
      $this->assertEquals(3, $ret);

      $ret = $this->obj->Multiply_vector([0, 0, 1], '');
      $this->assertFalse($ret);
      $ret = $this->obj->Multiply_vector('', [3, -2, -1]);
      $this->assertFalse($ret);

   }

   /**
    * Execute test
    *
    */
   public function test_Calc_recognition()
   {
      // normal
      $ret = [];
      $ret = $this->obj->Calc_recognition('', $this->normal_input, $this->label);
      $this->assertTrue(is_array($ret));

      // element count error
      $ret = $this->obj->Calc_recognition('', $this->element_error_input, $this->label);
      $this->assertFalse($ret);

      // data count error
      $ret = $this->obj->Calc_recognition('', $this->count_error_input, $this->label);
      $this->assertFalse($ret);

      // data duplicate error
      $ret = $this->obj->Calc_recognition('', $this->duplicate_error_input, $this->label);
      $this->assertFalse($ret);
   }
}
