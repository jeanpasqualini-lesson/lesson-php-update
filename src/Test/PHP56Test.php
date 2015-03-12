<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 3:25 PM
 */
namespace Name\Space
{
    const FOO = 42;
    function f() { return __FUNCTION__; }
}

namespace Test {

    use Interfaces\TestInterface;
    use Test\PHP56\ConstantExpression;

    use const Name\Space\FOO as FOOUSe;
    use function Name\Space\f as fUse;

    class PHP56Test implements TestInterface
    {
        const ARR = ["a", "b"];

        public function runTest()
        {
            echo "result constant Expression : " . (new ConstantExpression())->f() . PHP_EOL;

            echo "result array constant : " . PHP_EOL . print_r(self::ARR, true) . PHP_EOL;

            echo "result variable function operator : " . PHP_EOL . print_r($this->testVariableFunctionOperator("one", "two", "three", "foor", "five"), true) . PHP_EOL;

            echo "result decompress argument operator : " . PHP_EOL . print_r($this->testDecompressArgumentOperator(1, ...[2, 3, 4, 5]), true) . PHP_EOL;

            echo "result exponentation : 2 ** 3 == " . (2 ** 3) . PHP_EOL;

            echo "result use function use const : ".$this->testUseFunctionUseConst().PHP_EOL;

            echo "result php5-dbg".PHP_EOL;

            if(extension_loaded("gmp"))
            {
                echo "result gmp : ".$this->testGmp().PHP_EOL;
            }

            $hashData = crypt('12345', '$2a$07$usesomesillystringforsalt$');

            echo "result hash equal : ".((hash_equals($hashData, $hashData)) ? "oui" : "non").PHP_EOL;

            echo "result __debuginfo : ".var_dump($this).PHP_EOL;


        }

        public function  __debugInfo()
        {
            return [
               "propSquared" => "ok"
            ];
        }

        private function testGmp()
        {
            $a = \gmp_init(42);

            $b = \gmp_init(17);

            return ($a + $b);
        }

        private function testVariableFunctionOperator($one, $two, ...$params)
        {
            return array_merge(array($one, $two), $params);
        }

        private function testDecompressArgumentOperator($one, $two, $three, $foor, $five)
        {
            return array($one, $two, $three, $foor, $five);
        }

        public function testUseFunctionUseConst()
        {
            return fUse()." ".FOOUSe.PHP_EOL;
        }


    }
}