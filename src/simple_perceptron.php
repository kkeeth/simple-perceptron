<?php

/**
 * 識別関数y=w^Txの計算
 *
 * @param Array $weightVector 重みベクトル
 * @param Array $inputVector  入力データ
 *
 * @return Array [$ret, $val]  判定結果と値
 */
function Calc_recognition($weightVector = '', $inputVector = '')
{
   // ベクトル同士の計算
   $val = Calc_vector($weightVector, $inputVector);
   $ret = $val >= 0 ? 1 : -1;

   return [$ret, $val];
}

/**
 * ベクトル同士の計算
 *
 * @param Array $wVec 重みベクトル
 * @param Array $xVec 入力データ
 *
 * @return Int   $ret  計算結果
 */
function Calc_vector($wVec = '', $xVec = '')
{
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

/**
 * 学習部分　識別関数に学習データを順繰りに入れて、重みベクトルを更新する
 *
 * @param Array $wVec  重みベクトル
 * @param Array $xVec  学習データ
 * @param Array $label 判定結果ラベル
 *
 * @return Array $rets  計算結果
 */
function Update_weight($wVec, $xVec, $label)
{
   $rets = '';
   list($ret, $val] = Calc_recognition($wVec, $xVec);

   // 学習係数(lerning cofficient)　なるべく1未満
   $lc = 0.3;

   if ($val * $label < 0) {
      $rets = $wVec + $c * $label* $xVec;
   } else {
      $rets = $wVec;
   }
   return $rets;
}

