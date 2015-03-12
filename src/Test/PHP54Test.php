<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 6:07 PM
 */

namespace Test;


use Interfaces\TestInterface;

class PHP54Test implements TestInterface {

    public static function testClassExpression()
    {
        return "ok";
    }

    public function testAccesAttributObjectInstantiation()
    {
        return "ok";
    }

    public function testAccesIndexArrayOuputFunction()
    {
        return ["ok", "ok", "ok"];
    }

    public function testAcessFermetureThis()
    {
        return "ok";
    }

    public function runTest()
    {
        echo "test class expression : ".self::{"test".ucfirst("class").ucfirst("expression")}().PHP_EOL;

        echo "test access attribut objet dès l'instantiation : ".(new PHP54Test)->testAccesAttributObjectInstantiation().PHP_EOL;

        echo "test access index tableau à la sortie d'une fonction : ".$this->testAccesIndexArrayOuputFunction()[0].PHP_EOL;

        $handleTestAccesFermetureThis = function()
        {
            return $this->testAcessFermetureThis();
        };

        echo "test access à this dans une fermeture : ".$handleTestAccesFermetureThis().PHP_EOL;

        // TODO: Implement runTest() method.
    }

}