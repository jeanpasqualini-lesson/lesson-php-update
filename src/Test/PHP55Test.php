<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 4:14 PM
 */

namespace Test;


use Interfaces\TestInterface;

class PHP55Test implements TestInterface {

    public function runTest()
    {
        echo "result yield : ".PHP_EOL.print_r(iterator_to_array($this->xrange(1, 9, 2)), true).PHP_EOL;

        echo "result list in foreach : ".PHP_EOL.print_r(iterator_to_array($this->testList()), true).PHP_EOL;
        // TODO: Implement runTest() method.

        echo "resutl finally : ".$this->testFinaly().PHP_EOL;

        echo "result expression arbitraire with empty() : ".$this->testExpressionArbitraire().PHP_EOL;

        echo "déréferement litéral direct des array et string : ".$this->testDereferencementLiteralArrayString().PHP_EOL;

        echo "resolution nom class via ::class : ".$this->testResolutionNomClass().PHP_EOL;
    }

    private function testResolutionNomClass()
    {
        return self::class;
    }

    private function testDereferencementLiteralArrayString()
    {
        return [1, 2, 3][0]. " ".'PHP'[0].PHP_EOL;
    }

    private function testExpressionArbitraire()
    {
        $returnParameter = function($value) { return $value; };

        $data = array("", "no empty");

        $message = array();

        foreach($data as $dataItem)
        {
            $message[] = var_export($dataItem, true)." == ".var_export(empty($returnParameter($dataItem)), true);
        }

        return implode(" && ",  $message);
    }

    private function testFinaly()
    {
        $message = array();

        try {
            throw new \Exception();
        }
        catch(\Exception $e)
        {
            $message[] = "une exception";
        }
        finally
        {
            $message[] = "une finaly";
        }

        return implode(", ", $message);
    }

    private function xrange($start, $limit, $step = 1)
    {
        for($i = $start; $i <= $limit; $i += $step)
        {
            yield $i;
        }
    }

    private function testList()
    {
        $array = [
            [1, 2],
            [3, 4]
        ];

        foreach($array as list($a, $b))
        {
            yield $a." => ".$b;
        }
    }

}