<?php

/**
 * data convert special vector 
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
 * calculate identification function y=w^Tx
 *
 * @param Array  $weight weight vector
 * @param Array  $data   input data
 * @param String $label  expect label
 *
 * @return Array [$ret, $val] result label,value
 */
function Calc_recognition($weight = '', $data = '', $label = '')
{
   // calculate vector each other
   $val = Multiply_vector($weight, $data);
   $ret = $val >= 0 ? 1 : -1;

   // identify
   if ($ret != $label) Update_weight($weight, $data, $label);

   return [$ret, $val];
}

/**
 * Multiply vector to each other
 *
 * @param Array  $weight weight vector
 * @param Array  $data   input data
 * 
 * @return Int $ret result
 */
function Multiply_vector($weight = '', $data = '')
{
   // return variable
   $ret = 0;

   // format check
   if (count($weight) != count($data)) return -1;

   // null check
   if ($weight == '' || $data == '') return -1;

   // calculate
   foreach ($weight as $key => $value) {
      $ret += $weight[$key] * $data[$key];
   }

   return $ret;
}


/**
 * Add vector to each other
 *
 * @param Array  $weight weight vector
 * @param Array  $data   input data
 * 
 * @return Int $ret result
 */
function Add_vector($weight = '', $data = '')
{
   // return array
   $ret = [];

   // format check
   if (count($weight) != count($data)) return -1;

   // null check
   if ($weight == '' || $data == '') return -1;

   // calculate
   foreach ($weight as $key => $value) {
      $ret[$key] += $weight[$key] + $data[$key];
   }

   return $ret;
}


/**
 * learning part(update weight vector)
 *
 * @param Array  $weight weight vector
 * @param Array  $data   learning data
 * @param String $label  expect label
 *
 * @return Array $rets result
 */
function Update_weight($weight, $data, $label)
{
   $rets = '';
   $new_data = [];

   // learning cofficient
   $lc = 0.3;

   // learn
   foreach ($data as $val) {
      array_push($new_data, $lc * $label * $val);
   }

   $rets = Add_vector($weight, $new_data);
   return $rets;
}

