<?php

namespace App\Services;

class NaiveBayes {

  protected static $data_gejala;
  protected static $data_penyakit;
  protected static $selected_gejala;

  protected static $prior_probability;
  protected static $likelihood_probability;
  protected static $posterior_probability;

  public static function init($gejala, $penyakit, $selected_gejala) {
    self::$data_gejala = $gejala;
    self::$data_penyakit = $penyakit;
    self::$selected_gejala = $selected_gejala;

    return new self();
  }

  public static function calculatePrior() {

    if (isset(self::$prior_probability)) {
      return self::$prior_probability;
    }

    $data_penyakit = self::$data_penyakit;
    $data_gejala = self::$data_gejala;
    $total_data = count($data_gejala->groupBy('kode_gejala'));
    $prior = [];

    foreach ($data_penyakit as $penyakit) {
      $count_penyakit = 0;

      foreach ($data_gejala as $gejala) {
        if ($gejala->penyakit->nama_penyakit === $penyakit->nama_penyakit) {
          $count_penyakit++;
        }
      }
      $prior[$penyakit->nama_penyakit] = number_format($count_penyakit / $total_data, 2);
    }

    self::$prior_probability = $prior;
    // return self::$prior_probability;
    return new self();
  }

  public static function calculateLikelihood() {
    if (!isset(self::$posterior_probability)) {
        self::calculatePrior();
    }
    if (isset(self::$likelihood_probability)) {
        return self::$likelihood_probability;
    }

    $data_penyakit = self::$data_penyakit;
    $data_gejala = self::$data_gejala;
    $selected_gejala = self::$selected_gejala;
    $likelihood = [];

    $gejala_by_penyakit = [];
    foreach ($data_gejala as $gejala) {
        $penyakit_name = $gejala->penyakit->nama_penyakit;
        if (!isset($gejala_by_penyakit[$penyakit_name])) {
            $gejala_by_penyakit[$penyakit_name] = [];
        }
        $gejala_by_penyakit[$penyakit_name][] = $gejala->kode_gejala;
    }

    foreach ($data_penyakit as $penyakit) {
        $penyakit_name = $penyakit->nama_penyakit;
        $count_selected_gejala = 0;
        if (isset($gejala_by_penyakit[$penyakit_name])) {
            foreach ($selected_gejala as $feature) {
                if (in_array($feature, $gejala_by_penyakit[$penyakit_name])) {
                    $count_selected_gejala++;
                }
            }
        }
        $likelihood[$penyakit_name] = $count_selected_gejala;
    }

    foreach ($data_penyakit as $penyakit) {
        $penyakit_name = $penyakit->nama_penyakit;
        if (!isset($likelihood[$penyakit_name])) {
            $likelihood[$penyakit_name] = 0;
        }
    }

    $total_data_by_penyakit = [];
    foreach ($data_gejala as $gejala) {
        $penyakit_name = $gejala->penyakit->nama_penyakit;
        if (!isset($total_data_by_penyakit[$penyakit_name])) {
            $total_data_by_penyakit[$penyakit_name] = 0;
        }
        $total_data_by_penyakit[$penyakit_name]++;
    }

    foreach ($likelihood as $penyakit_name => $value) {
      $likelihood[$penyakit_name] = number_format($value / $total_data_by_penyakit[$penyakit_name], 1);
    }

    self::$likelihood_probability = $likelihood;

    // return self::$likelihood_probability;
    return new self();
  }

  public static function calculatePosterior() {

    if (!isset(self::$posterior_probability)) {
      self::calculatePrior();
    }

    if (!isset(self::$likelihood_probability)) {
      self::calculateLikelihood();
    }

    if (isset(self::$posterior_probability)) {
      return self::$posterior_probability;
    }

    $prior = self::$prior_probability;
    $likelihood = self::$likelihood_probability;
    $posterior = [];
    
    foreach ($prior as $penyakit => $value) {
      $posterior[$penyakit] = $value * $likelihood[$penyakit];
    }

    self::$posterior_probability = $posterior;
    
    // return self::$posterior_probability;
    return new self();
  }

  public function result() {
    $posterior = self::$posterior_probability;
    $total_sum_value = 0;
    $normalization_value = [];
    $result = [];

    foreach ($posterior as $penyakit => $value) {
      $total_sum_value += $value;

    }
    
    foreach ($posterior as $penyakit => $value) {
      $normalization_value[$penyakit] = number_format($value / $total_sum_value, 3);
    }

    foreach ($normalization_value as $penyakit => $norm_value) {
      $result[$penyakit] = $norm_value / max($normalization_value) * 100;
    }
    return [
      'result' => $result,
      'bobot_probabillity' => $posterior
    ];
  }
}