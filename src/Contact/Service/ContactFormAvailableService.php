<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/27/19
 * Time: 10:00 AM
 */

namespace App\Contact\Service;


use App\Contact\Exception\MinuteIsEvenException;
use App\Contact\Exception\RandomIsBelowFiveException;
use App\General\Exception\NetworkUnavailableException;
use App\General\Service\NetworkStatusService;

class ContactFormAvailableService
{
    /**
     * @var NetworkStatusService
     */
    private $networkStatus;

    public function __construct(NetworkStatusService $networkStatus)
    {
        $this->networkStatus = $networkStatus;
    }

    /**
     * @throws MinuteIsEvenException
     * @throws RandomIsBelowFiveException
     */
    public function shouldBeAvailable() : void
    {
        $network = $this->networkStatus->isUp();
        if(!$network){
            throw new NetworkUnavailableException($network);
        }
        $randomNumber = rand(1,10);
        $minute = intval(date('i'));
        if( $randomNumber < 5) {
            throw new RandomIsBelowFiveException($randomNumber);
        }

        if($minute % 2){
            throw new MinuteIsEvenException($minute);
        }

    }
}