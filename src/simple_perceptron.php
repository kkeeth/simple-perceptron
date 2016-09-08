<?php
define('DATA_COUNT', 5);
define('DIMENSION', 3);
define('LC', 0.8);   // learning cofficient

class simple_perceptron
{
   /**
    * Main function
    *
    * @return Array updated weight vector
    */
   function index()
   {
      $ret = '';
      list($data, $label) = self::Create_data();

      return self::Calc_recognition('', $data, $label);
   }

   /**
    * Create input data(vector)
    *
    * @return Array $data input data
    */
   public function Create_data()
   {
      // dummy data
      $data   = range(1, DATA_COUNT);
      $labels = range(1, DATA_COUNT);

      // create input data
      foreach ($data as $key => $value) {
         $data[$key]   = [];
         $labels[$key] = mt_rand(-1, 1) >= 0 ?  1 : -1;
         for ($i = 0; $i < DIMENSION; $i++) {
            $data[$key][$i] = mt_rand(1, 5);
         }
      }

      return [$data, $labels];
   }

   /**
    * Data convert special vector
    *
    * @param Array $data input data
    *
    * @return Array $data added data
    */
   function Get_data($data)
   {
      array_push($data, 1);
      return $data;
   }

   /**
    * Calculate identification function y=w^Tx
    *
    * @param Array $weight weight vector
    * @param Array $data   input data
    * @param Array $label  expect label
    *
    * @return Array [$ret, $val] result label,value
    */
   function Calc_recognition($weight = '', $data = '', $label = '')
   {
      // for infinity loop
      $cnt = 0;
      // re-loop flag
      $miss_flg = 1;
      // new weight vector
      $updated_weight = [];

      if ($weight == '') $weight = array_fill(0, DIMENSION+1, 0);

      // learning
      while ($miss_flg) {
         $cnt++;
         $miss_flg = 0;

         foreach ($data as $key => $point_data) {
            // calculate vector each other
            $val = self::Multiply_vector($weight, self::Get_data($point_data));

            // error check
            if ($val === false) return false;

            // identify
            if ($val * $label[$key] <= 0) {
               $weight = self::Update_weight($weight, self::Get_data($point_data), $label[$key]);
               $miss_flg = 1;
            }
         }

         if ($cnt > 1000) return false;   // is not convergent
      }

      return $weight;
   }

   /**
    * Multiply vector to each other
    *
    * @param Array $weight weight vector
    * @param Array $data   input data
    *
    * @return Int $ret result
    */
   function Multiply_vector($weight = '', $data = '')
   {
      // return variable
      $ret = 0;

      // format check
      if (count($weight) != count($data)) return false;

      // null check
      if ($weight == '' || $data == '') return false;

      // calculate
      foreach ($weight as $key => $value) {
         $ret += $weight[$key] * $data[$key];
      }

      return $ret;
   }

   /**
    * Learning part(update weight vector)
    *
    * @param Array  $weight weight vector
    * @param Array  $data   learning data
    * @param String $label  expect label
    *
    * @return Array $ret updated weight vector
    */
   function Update_weight($weight, $data, $label)
   {
      $ret = [];
      $cnt = count($weight);

      // learning
      foreach ($weight as $key => $element) {
         if ($key == $cnt) {
            $ret[$key] = $element + (LC * $label);
         } else {
            $ret[$key] = $element + (LC * $label * $data[$key]);
         }
      }

      return $ret;
   }
}
