<?php

namespace turbopixel;

class GS1Validator {

  private $testEan = "5901234123457";

  /**
   *
   * @param string $ean
   *
   * @return bool
   */
  public function isValidEan13(string $ean) : bool {
    $eanLength = strlen($ean);

    if ($eanLength !== 13) {
      return false;
    };

    $checkDigit = $this->getEan13CheckDigit($ean);

    return $checkDigit === (int)$ean[12];
  }

  /**
   * Calculate the EAN13 check digit
   *
   * Summing up: 0 * 3 + 9 * 1 + 8 * 3 + 7 * 1 + 6 * 3 + 5 * 1 + 4 * 3 + 3 * 1 + 2 * 3 + 1 * 1 + 0 * 3 + 4 * 1 = 89
   * Dividing: 89 / 10 = 8 Reminder 9
   * Check Digit: 10 - 9 = 1
   *
   * @param string $ean13
   *
   * @return int|null
   */
  public function getEan13CheckDigit(string $ean13) : ?int {
    $eanArr    = array_map('intval', str_split($ean13));
    $sum       = $eanArr[1] + $eanArr[3] + $eanArr[5] + $eanArr[7] + $eanArr[9] + $eanArr[11];
    $sumRest   = $eanArr[0] + $eanArr[2] + $eanArr[4] + $eanArr[6] + $eanArr[8] + $eanArr[10];
    $total_sum = ($sum * 3) + $sumRest;
    $next_ten  = (ceil($total_sum / 10)) * 10;

    return ($next_ten - $total_sum);
  }

}

//$Validator = new GS1Validator();
//echo "<pre>";
//var_dump("4012345678901", $Validator->isValidEan13(4012345678901));
//var_dump("4012345678901", $Validator->getEan13CheckDigit(4012345678901));
//echo "<hr>";
//var_dump("5901234123457", $Validator->isValidEan13(5901234123457));
//var_dump("5901234123457", $Validator->getEan13CheckDigit(5901234123457));
//echo "<hr>";
//var_dump("590123412345", $Validator->isValidEan13(590123412345));
//var_dump("590123412345", $Validator->getEan13CheckDigit(590123412345));
//echo "<hr>";
//var_dump("123456", $Validator->isValidEan13(123456));
//var_dump("123456", $Validator->getEan13CheckDigit(123456));
//echo "<hr>";
//var_dump("4005249006710", $Validator->isValidEan13(4005249006710));
//var_dump("4005249006710", $Validator->getEan13CheckDigit(4005249006710));