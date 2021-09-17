# GS1Valdiator

This library is a small gs1 barcode validation class.

## Runtime 

```text
  System: Linux 4.19.0-10-amd64 #1 SMP Debian 4.19.132-1 (2020-07-24) x86_64 
  PHP Version 7.3.27-1~deb10u1
  
  /////////////////////////////////////////////////
  /////////////////////////////////////////////////
                      StandardTest
  /////////////////////////////////////////////////
  /////////////////////////////////////////////////
Array
(
    [Clock time in seconds] => 0.0034449100494385
    [Time taken in User Mode in seconds] => 0.0034390000000002
    [Time taken in System Mode in seconds] => 0
    [Total time taken in Kernel in seconds] => 0.0034390000000002
    [Memory limit in MB] => 256
    [Memory usage in MB] => 0.20989227294922
    [Peak memory usage in MB] => 0.6064453125
    [Maximum resident shared size in KB] => 20
    [Integral shared memory size] => 0
    [Integral unshared data size] => 0
    [Integral unshared stack size] => Not Available
    [Number of page reclaims] => 20
    [Number of page faults] => 0
    [Number of block input operations] => 0
    [Number of block output operations] => Not Available
    [Number of messages sent] => 0
    [Number of messages received] => 0
    [Number of signals received] => 0
    [Number of voluntary context switches] => 0
    [Number of involuntary context switches] => 0
)


  /////////////////////////////////////////////////
  /////////////////////////////////////////////////
                      Benchmark
          run isValidEan13 1.000.000 times
  /////////////////////////////////////////////////
  /////////////////////////////////////////////////
Array
(
    [Clock time in seconds] => 1.4627749919891
    [Time taken in User Mode in seconds] => 1.462003
    [Time taken in System Mode in seconds] => 1.000000000001E-6
    [Total time taken in Kernel in seconds] => 1.462004
    [Memory limit in MB] => 256
    [Memory usage in MB] => 0.0022964477539062
    [Peak memory usage in MB] => 0.61138153076172
    [Maximum resident shared size in KB] => 0
    [Integral shared memory size] => 0
    [Integral unshared data size] => 0
    [Integral unshared stack size] => Not Available
    [Number of page reclaims] => 0
    [Number of page faults] => 0
    [Number of block input operations] => 0
    [Number of block output operations] => Not Available
    [Number of messages sent] => 0
    [Number of messages received] => 0
    [Number of signals received] => 0
    [Number of voluntary context switches] => 0
    [Number of involuntary context switches] => 16
)
```