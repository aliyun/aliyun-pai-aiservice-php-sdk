<?php
/**
 * AigcImagesApiTest
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 */

namespace Swagger\Client;

use Swagger\Client\Configuration;
use Swagger\Client\Api;
use Swagger\Client\ApiException;
use Swagger\Client\ObjectSerializer;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

use function PHPUnit\Framework\assertEquals;

/**
 * AigcImagesApiTest Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AigcImagesApiTest extends TestCase
{
    private static  $apiInstance;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        $config = Configuration::getDefaultConfiguration();
        $config->setHost(getenv("Host"));
        $config->setAppId(getenv("AppId"));
        $config->setToken(getenv("Token"));

        self::$apiInstance = new Api\AigcImagesApi(
            new Client(),
            $config
        );
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test case for aigcImagesCheck
     *
     * aigc图像检测.
     *
     */
    public function testAigcImagesCheck()
    {
        $images = array("https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_images/foto/train/1.jpg", "https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_images/foto/train/0.jpg");

        $response = self::$apiInstance->aigcImagesCheck($images);
        assertEquals("OK", $response->getCode());
        if ($response->getCode() != 'OK') {
            print("error message : ". $response->getMessage());
            return;
        }
        print($response);
    }

    /**
     * Test case for aigcImagesCreate
     *
     * aigc预测.
     *
     */
    public function testAigcImagesCreate()
    {
        $modelId = '115aaf09-47a0-4aef-98cf-3582ceffb675';
        $templateImage = 'https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_weights/foto10/validation/global_step_Blue_1_100_0.jpg';
        $response = self::$apiInstance->aigcImagesCreate($modelId, $templateImage);
        assertEquals("OK", $response->getCode());
        if ($response->getCode() != 'OK') {
            print("error message : ". $response->getMessage());
            return;
        }
        print($response);
    }

    /**
     * Test case for testAigcImagesCreateByMultiModelIds
     *
     * aigc预测.
     *
     */
    public function testAigcImagesCreateByMultiModelIds()
    {
        $modelIds = array('115aaf09-47a0-4aef-98cf-3582ceffb675', '115aaf09-47a0-4aef-98cf-3582ceffb675');
        $templateImage = 'https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_weights/foto10/validation/global_step_Blue_1_100_0.jpg';
        $response = self::$apiInstance->aigcImagesCreateByMultiModelIds($modelIds, $templateImage);
        assertEquals("OK", $response->getCode());
        if ($response->getCode() != 'OK') {
            print("error message : ". $response->getMessage());
            return;
        }
        print($response);
    }

    /**
     * Test case for aigcImagesTrain
     *
     * aigc AI 写真训练 
     *
     */
    public function testAigcImagesTrain()
    {
        $images = array("https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_images/foto/train/1.jpg", "https://pai-aigc-photog-bj.oss-cn-beijing.aliyuncs.com/photog/user_images/foto/train/0.jpg");

        $response = self::$apiInstance->aigcImagesTrain($images);
        assertEquals("OK", $response->getCode());
        if ($response->getCode() != 'OK') {
            print("error message : ". $response->getMessage());
            return;
        }

        print($response);
        $jobId = $response->getData()["job_id"];
        $modelId = $response->getData()["model_id"];
        print($jobId . "\n"); // job id
        print($modelId . "\n"); // model id ， 用于生成接口


    }
}
