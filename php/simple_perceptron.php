<?php

// 識別関数y=w^Txの計算
function calc_recognition($weightVector = '', $inputVector = '') {
   // ベクトル同士の計算
   $val = calc_vector($weightVector, $inputVector);
   $ret = $val >= 0 ? 1 : -1;

   return [$ret, $val];
}

// ベクトル同士の計算
function calc_vector($wVec = '', $xVec = '') {
   // 戻り値用変数
   $ret = 0;

   // 個数チェック
   if (count($wVec) != count($xVec)) return -1;
   // nullチェック
   if ($wVec == '' || $xVec == '') return -1;

   // 計算
   foreach ($wVec as $key => $value) {
      $ret += $wVec[$key] * $xVec[$key];
   }

   return $ret;
}
