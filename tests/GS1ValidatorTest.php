<?php

namespace Tests;

require "../vendor/autoload.php";

ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);

use PHPUnit\Framework\TestCase;
use turbopixel\GS1Validator;

class GS1ValidatorTest extends TestCase {

  public function testCheckDigitIsInt() {
    $GS1Validator = new GS1Validator();
    $check        = $GS1Validator->getEan13CheckDigit("4005249006710");

    $this->assertIsInt($check);
  }

  public function testCheckDigitIsSame() {
    $GS1Validator = new GS1Validator();
    $check        = $GS1Validator->getEan13CheckDigit("4005249006710");

    $this->assertSame($check, 0);
  }

  public function testIsValidEan13() {
    $GS1Validator = new GS1Validator();
    $check        = $GS1Validator->isValidEan13("4005249006710");

    $this->assertIsBool($check);
  }

  public function testIsBadEan13() {
    $GS1Validator = new GS1Validator();
    $check        = $GS1Validator->isValidEan13("400524900671");

    $this->assertFalse($check);
  }

  public function testIsLength13() {
    $GS1Validator = new GS1Validator();

    $this->assertSame($GS1Validator->strLength(4000417222008), 13);
  }

}

// manual run
$UnitTest = new GS1ValidatorTest('ExampleTest');
$UnitTest->testCheckDigitIsInt();
$UnitTest->testCheckDigitIsSame();
$UnitTest->testIsValidEan13();
$UnitTest->testIsBadEan13();
$UnitTest->testIsLength13();
