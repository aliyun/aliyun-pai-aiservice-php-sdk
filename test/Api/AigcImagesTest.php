<?php
namespace Swagger\Client;

use Exception;
use Swagger\Client\Configuration;
use Swagger\Client\Api;
use GuzzleHttp\Client;

define("JOB_STATE_INIT", 0);
define("JOB_STATE_WAIT", 1);
define("JOB_STATE_SUCCESS", 2);
define("JOB_STATE_FAILED", 3);

require_once(__DIR__ . '/../../vendor/autoload.php');
$config = Configuration::getDefaultConfiguration();
$config->setHost(getenv("Host")); // host
$config->setAppId(getenv("AppId")); // appid
$config->setToken(getenv("Token")); // token

$apiInstance = new Api\AigcImagesApi(
    new Client(),
    $config
);

// 训练图片
$images = array("https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_images/foto/train/1.jpg",
"https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_images/foto/train/0.jpg");

$response = $apiInstance->aigcImagesTrain($images);
$jobId = $response->getData()["job_id"]; // 异步任务ID
$modelId = $response->getData()["model_id"]; // 模型ID
print("job_id=". $jobId . ", model_id=". $modelId. "\n");

$jobApi = new Api\AiServiceJobApi(new Client(), $config);

while(true) {
    $jobResponse = $jobApi->getAsyncJob($jobId);
    $jobData = (array)$jobResponse->getData();
    $jobInfo = (array)$jobData["job"];
    if ($jobInfo["state"] == JOB_STATE_WAIT || $jobInfo["state"] == JOB_STATE_INIT ) {
        print("job running\n");
    } else if ($jobInfo["state"] == JOB_STATE_SUCCESS) {
        print("job success\n");
        print($jobResponse);
        break;
    } else {
        print("job fail\n");
        print($jobResponse);
        throw new Exception("job fail");
    }

    // wait
    sleep(30);
}

// 模板图片
$templateImage = "https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_weights/foto10/validation/global_step_Blue_1_100_0.jpg";
// 生成图片
$response = $apiInstance->aigcImagesCreate($modelId, $templateImage);

print($response);
// 生成图片的 base64
print($response->getData()["image"]);

