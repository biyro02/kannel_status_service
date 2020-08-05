<?php
/**
 * I want to be a part-time(20 hours per week) worker with you.
 * I'm working more fast then any junior minimum 2 times.
 * If we will deal, please give the jobs weekly.
 * Because I'm still working another company.
 * I have the regularly payment and it is about 5000 Turkish Liras.
 */

require __DIR__ . "/autoloader.php";
require __DIR__ . '/vendor/autoload.php';

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
