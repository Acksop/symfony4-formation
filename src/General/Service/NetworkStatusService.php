<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/27/19
 * Time: 2:35 PM
 */

namespace App\General\Service;


class NetworkStatusService
{
    public function isUp() : bool
    {
        $isConnected = @fsockopen('google.com', 80);
        if(!$isConnected){
            return false;
        }
        fclose($isConnected);
        return true;
    }

}