<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/27/19
 * Time: 10:06 AM
 */

namespace App\Contact\Exception;


class RandomIsBelowFiveException extends \Exception
{
    private $givenRandomNumber;

    public function __construct(string $givenRandomNumber)
    {
        $this->givenRandomNumber = $givenRandomNumber;
        parent::__construct("Number is below five ($givenRandomNumber)");
    }
}