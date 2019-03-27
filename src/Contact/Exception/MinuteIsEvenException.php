<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/27/19
 * Time: 10:06 AM
 */

namespace App\Contact\Exception;


class MinuteIsEvenException extends \Exception
{
    private $givenMinute;

    public function __construct(string $givenMinute)
    {
        $this->givenRandomNumber = $givenMinute;
        parent::__construct("Minute is odd ($givenMinute)");
    }
}