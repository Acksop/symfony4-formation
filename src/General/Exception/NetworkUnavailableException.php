<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/27/19
 * Time: 2:27 PM
 */

namespace App\General\Exception;


class NetworkUnavailableException extends \Exception
{
    private $givenNetwork;

    public function __construct(string $givenNetwork)
    {
        $this->givenNetwork = !$givenNetwork;
        parent::__construct("Network don't work ({$givenNetwork})");
    }
}