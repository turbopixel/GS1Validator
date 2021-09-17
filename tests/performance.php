<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use turbopixel\GS1Validator;

require "../vendor/autoload.php";

ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);

echo "<pre>";
echo <<<TEST
  System: Linux 4.19.0-10-amd64 #1 SMP Debian 4.19.132-1 (2020-07-24) x86_64 
  PHP Version 7.3.27-1~deb10u1
  
  /////////////////////////////////////////////////
  /////////////////////////////////////////////////
                      StandardTest
  /////////////////////////////////////////////////
  /////////////////////////////////////////////////

TEST;


$RunTime = new \AppGati();
$RunTime->step("START");

$UnitTest = new \Tests\GS1ValidatorTest('StandardTest');
$RunTime->step("testCheckDigitIsInt");
$UnitTest->testCheckDigitIsInt();
$RunTime->step("testCheckDigitIsSame");
$UnitTest->testCheckDigitIsSame();
$RunTime->step("testIsValidEan13");
$UnitTest->testIsValidEan13();
$RunTime->step("testIsInvalidEan13");
$UnitTest->testIsInvalidEan13();
$RunTime->step("testIsLength13");
$UnitTest->testIsLength13();
$RunTime->step("END");

print_r($RunTime->getReport("START", "END"));

echo <<<TEST


  /////////////////////////////////////////////////
  /////////////////////////////////////////////////
                      Benchmark
          run isValidEan13 1.000.000 times
  /////////////////////////////////////////////////
  /////////////////////////////////////////////////

TEST;

$UnitTest     = new \Tests\GS1ValidatorTest('Benchmark');
$GS1Validator = new GS1Validator();

$RunTime->step("B_START");

for ($i = 0; $i <= 500000; $i++) {
  $GS1Validator->isValidEan13("4010355500595");
  $GS1Validator->isValidEan13("4260535818143");
}

$RunTime->step("B_END");

print_r($RunTime->getReport("B_START", "B_END"));
