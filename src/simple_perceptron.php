<?php

/**
 * 識別関数y=w^Txの計算
 *
 * @param Array  $weight 重みベクトル
 * @param Array  $data   入力データ
 * @param String $label  期待値ラベル
 *
 * @return Array [$ret, $val] 判定結果と値
 */
function Calc_recognition($weight = '', $data = '', $label = '')
{
   // ベクトル同士の計算
   $val = Calc_vector($weight, $data);
   $ret = $val >= 0 ? 1 : -1;

   // 計算結果で識別
   if ($ret != $label) Update_weight($weight, $data, $label);

   return [$ret, $val];
}

/**
 * ベクトル同士の計算
 *
 * @param Array $weight 重みベクトル
 * @param Array $data   入力データ
 *
 * @return Int   $ret  計算結果
 */
function Calc_vector($weight = '', $data = '')
{
   // 戻り値用変数
   $ret = 0;

   // 個数チェック
   if (count($weight) != count($data)) return -1;

   // nullチェック
   if ($weight == '' || $data == '') return -1;

   // 計算
   foreach ($weight as $key => $value) {
      $ret += $weight[$key] * $data[$key];
   }

   return $ret;
}

/**
 * 学習部分　識別関数に学習データを順繰りに入れて、重みベクトルを更新する
 *
 * @param Array  $weight 重みベクトル
 * @param Array  $data   学習データ
 * @param String $label  識別結果ラベル
 *
 * @return Array $rets  計算結果
 */
function Update_weight($weight, $data, $label)
{
   $rets = '';
   list($ret, $val) = Calc_recognition($weight, $data);

   // 学習係数(lerning cofficient)　なるべく1未満
   $lc = 0.3;

   if ($val * $label < 0) {
      $rets = $weight + $lc * $label * $data;
   } else {
      $rets = $weight;
   }
   return $rets;
}

