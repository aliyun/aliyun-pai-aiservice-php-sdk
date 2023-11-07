<?php
/**
 * AiServiceJobApiTest
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

/**
 * AiServiceJobApiTest Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AiServiceJobApiTest extends TestCase
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

        self::$apiInstance = new Api\AiServiceJobApi(
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
     * Test case for getAsyncJob
     *
     * 根据 jobid 查询异步任务.
     *
     */
    public function testGetAsyncJob()
    {
        $response = self::$apiInstance->getAsyncJob(12958);
        print($response);
    }

    /**
     * Test case for getBatchJob
     *
     * 根据 batch id 查询异步任务.
     *
     */
    public function testGetBatchJob()
    {
    }
}
