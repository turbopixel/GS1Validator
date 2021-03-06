<?php declare(strict_types = 1);

namespace turbopixel;

/**
 * GS1Validator
 *
 * @author turbopixel
 */
class GS1Validator {

  /**
   * Returns the string length
   *
   * @param string $str
   *
   * @return int
   */
  public function strLength(string $str) : int {

    if (empty($str)) {
      return 0;
    }

    return strlen($str);
  }

  /**
   * Validate the EAN13 barcode number
   *
   * @param string $ean13
   *
   * @return bool
   */
  public function isValidEan13(string $ean13) : bool {
    $ean13Length = $this->strLength($ean13);

    if ($ean13Length !== 13) {
      return false;
    }

    $checkDigit = $this->getEan13CheckDigit($ean13);

    return $checkDigit === (int)$ean13[12];
  }

  /**
   * Calculate the EAN13 check digit
   *
   * @param string $ean13
   *
   * @return int
   */
  public function getEan13CheckDigit(string $ean13) : int {
    $eanArr    = array_map('intval', str_split($ean13));
    $sum       = $eanArr[1] + $eanArr[3] + $eanArr[5] + $eanArr[7] + $eanArr[9] + $eanArr[11];
    $sumRest   = $eanArr[0] + $eanArr[2] + $eanArr[4] + $eanArr[6] + $eanArr[8] + $eanArr[10];
    $total_sum = ($sum * 3) + $sumRest;
    $next_ten  = (ceil($total_sum / 10)) * 10;

    return (int)$next_ten - $total_sum;
  }

}
