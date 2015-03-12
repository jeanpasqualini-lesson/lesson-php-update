<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 4:25 PM
 */

namespace Test\PHP56;

const UN = 1;
const DEUX = UN * 2;


class ConstantExpression {
    const TROIS = DEUX + 1;
    const UN_SUR_TROIS = UN / self::TROIS;
    const RESULTAT = "La valeur de Trois est ".self::TROIS;

    public function f($a = UN + self::TROIS)
    {
        return $a;
    }
}