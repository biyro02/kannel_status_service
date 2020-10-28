<?php

require __DIR__ . "/autoloader.php";

use Kannel\Collections\StatusXmlCollection;
use Kannel\Services\KannelStatusService;

try{
    $kannelService = new KannelStatusService();
    /**
     * @var $response StatusXmlCollection
     */
    $response = $kannelService->getKannelStatus();
//    print_r($response->getStatus());
//    $kannelService->postKannelSms(["sms" => "This method will not work, because there is no method."]);
} catch (\Exception $exception){
    echo $exception->getMessage();
}
