<?php

require __DIR__ . "/autoloader.php";

use Kannel\Services\KannelStatusService;

try{
    $kannelService = new KannelStatusService();
    $response = $kannelService->getKannelStatus();
    print_r($response->getStatus());
    print_r($response->status);
//    $kannelService->postKannelSms(["sms" => "This method will not work, because there is no method."]);
} catch (\Exception $exception){
    echo $exception->getMessage();
}
