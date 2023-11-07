<?php
/**
 * AiServiceImageApiTest
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 */

namespace Swagger\Client;

use Swagger\Client\Configuration;
use Swagger\Client\ApiException;
use Swagger\Client\ObjectSerializer;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

use function PHPUnit\Framework\assertEquals;

/**
 * AiServiceImageApiTest Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AiServiceImageApiTest extends TestCase
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

        self::$apiInstance = new Api\AiServiceImageApi(
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
     * Test case for testFaceAttrImage
     *
     * 人脸识别接口 
     *
     */
    public function testFaceAttrImage()
    {
        $image = 'https://pai-rec-public.oss-cn-shanghai.aliyuncs.com/ai-service/demo/face_chenglong.png';
        $response = self::$apiInstance->faceAttrImage($image);
        assertEquals("OK", $response->getCode());

        print($response);
    }

    /**
     * Test case for aiModelImage
     *
     *  图片分类 
     *
     */
    public function testClassifyImage()
    {
        $image = 'https://pai-rec-public.oss-cn-shanghai.aliyuncs.com/ai-service/demo/lADPJvDqUu318wPNAWDNAjw_572_352.jpg';
        $response = self::$apiInstance->classifyImage($image);
        assertEquals("OK", $response->getCode());

        print($response);
    }
}
