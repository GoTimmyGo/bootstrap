<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Andy
 * Date: 29/05/13
 * Time: 10:46
 * To change this template use File | Settings | File Templates.
 */

class RestControllerLib
{
    public static function error($status = 200, $foo)
    {
        return $status . ' error :(';
    }
}