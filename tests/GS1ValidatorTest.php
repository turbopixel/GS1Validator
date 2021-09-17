<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use turbopixel\GS1Validator;

require "../vendor/autoload.php";

ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);

class GS1ValidatorTest extends TestCase {

  public function testCheckDigitIsInt() {
    $GS1Validator = new GS1Validator();
    $check        = $GS1Validator->getEan13CheckDigit("4005249006710");

    $this->assertIsInt($check);
  }

  public function testCheckDigitIsSame() {
    $GS1Validator = new GS1Validator();

    $check = $GS1Validator->getEan13CheckDigit("4005249006710");
    $this->assertSame($check, 0);

    $check = $GS1Validator->getEan13CheckDigit("4010355500595");
    $this->assertSame($check, 5);
  }

  public function testIsValidEan13() {
    $GS1Validator = new GS1Validator();

    $check = $GS1Validator->isValidEan13("4005249006710");
    $this->assertTrue($check);

    $check = $GS1Validator->isValidEan13("4010355500595");
    $this->assertTrue($check);

    // calculate and add the check digit
    $lastDigit = $GS1Validator->getEan13CheckDigit("401035550059"); // 5
    $check     = $GS1Validator->isValidEan13("401035550059" . $lastDigit);
    $this->assertTrue($check);
  }

  public function testIsInvalidEan13() {
    $GS1Validator = new GS1Validator();

    $check = $GS1Validator->isValidEan13("400524900671");
    $this->assertFalse($check);

    $check = $GS1Validator->isValidEan13("123456789111");
    $this->assertFalse($check);
  }

  public function testIsLength13() {
    $GS1Validator = new GS1Validator();

    $this->assertSame($GS1Validator->strLength("4000417222008"), 13);

    $this->assertSame($GS1Validator->strLength("4010355500595"), 13);
  }
}

// Manual run
//$UnitTest = new GS1ValidatorTest('ExampleTest');
//$UnitTest->testCheckDigitIsInt();
//$UnitTest->testCheckDigitIsSame();
//$UnitTest->testIsValidEan13();
//$UnitTest->testIsInvalidEan13();
//$UnitTest->testIsLength13();