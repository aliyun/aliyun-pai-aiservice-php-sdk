<?php
/**
 * AigcImagesApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Utils;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;
use Swagger\Client\Model\AIGCCheckRequest;
use Swagger\Client\Model\AIGCCreatRequest;
use Swagger\Client\Model\AIGCTrainRequest;

/**
 * AigcImagesApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AigcImagesApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }
    /**
     * 
     * aigc图像检测
     * 
     * @param string[] $images images 检查的图片列表
     * @param mixed[] $config  模型配置 
     * @param string $modelName 模型名称，如何使用全局模型，值为空 
     */
    public function aigcImagesCheck($images,  $config = [], $modelName = '') {
        $request = new AIGCCheckRequest();
        $request->setImages($images);
        $request->setAction("AIGCImageCheck");
        $request->setModelName($modelName);
        $request->setConfigure((object)$config);

        return $this->aigcImagesCheckPost($request);
    }

    /**
     * Operation aigcImagesCheckPost
     *
     * aigc图像检测
     *
     * @param  \Swagger\Client\Model\AIGCCheckRequest $body aigc检测body (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\Response
     */
    public function aigcImagesCheckPost($body)
    {
        list($response) = $this->aigcImagesCheckPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation aigcImagesCheckPostWithHttpInfo
     *
     * aigc图像检测
     *
     * @param  \Swagger\Client\Model\AIGCCheckRequest $body aigc检测body (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function aigcImagesCheckPostWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\Response';
        $request = $this->aigcImagesCheckPostRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation aigcImagesCheckPostAsync
     *
     * aigc图像检测
     *
     * @param  \Swagger\Client\Model\AIGCCheckRequest $body aigc检测body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aigcImagesCheckPostAsync($body)
    {
        return $this->aigcImagesCheckPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation aigcImagesCheckPostAsyncWithHttpInfo
     *
     * aigc图像检测
     *
     * @param  \Swagger\Client\Model\AIGCCheckRequest $body aigc检测body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aigcImagesCheckPostAsyncWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\Response';
        $request = $this->aigcImagesCheckPostRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'aigcImagesCheckPost'
     *
     * @param  \Swagger\Client\Model\AIGCCheckRequest $body aigc检测body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function aigcImagesCheckPostRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling aigcImagesCheckPost'
            );
        }

        $resourcePath = '/api/v1/aigc_images/check';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $sign = $this->config->createSign($resourcePath, 'POST', $httpBody, $queryParams);
        $headers['Authorization'] = $this->config->getAppId() . ":"  .  $sign;
        // this endpoint requires API key authentication
        $headers['X-Request-Time'] = time();

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     *  agic AI图片生成
     *  @param string $modelId AI训练接口返回的ID 
     *  @param string $templateImage 模板图片
     *  @param mixed[] $config 参数配置
     *  @param string $modelName  模型名称，默认为空
     */
    public function aigcImagesCreate($modelId, $templateImage, $config=[], $modelName = '') {
        $request = new AIGCCreatRequest();
        $request->setModelId($modelId);
        $request->setTemplateImage($templateImage);
        $request->setAction("AIGCImageCreate");
        $request->setModelName($modelName);
        $request->setConfigure((object)$config);

        return $this->aigcImagesCreatePost($request);
    }
    /**
     *  agic AI图片生成
     *  @param array $modelIds AI训练接口返回的ID 
     *  @param string $templateImage 模板图片
     *  @param mixed[] $config 参数配置
     *  @param string $modelName  模型名称，默认为空
     */

    public function aigcImagesCreateByMultiModelIds($modelIds, $templateImage, $config=[], $modelName = '') {
        $request = new AIGCCreatRequest();
        $request->setModelIds($modelIds);
        $request->setTemplateImage($templateImage);
        $request->setAction("AIGCImageCreate");
        $request->setModelName($modelName);
        $request->setConfigure((object)$config);

        return $this->aigcImagesCreatePost($request);
    }


    /**
     * Operation aigcImagesCreatePost
     *
     * aigc预测
     *
     * @param  \Swagger\Client\Model\AIGCCreatRequest $body aigc预测body (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\Response
     */
    public function aigcImagesCreatePost($body)
    {
        list($response) = $this->aigcImagesCreatePostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation aigcImagesCreatePostWithHttpInfo
     *
     * aigc预测
     *
     * @param  \Swagger\Client\Model\AIGCCreatRequest $body aigc预测body (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function aigcImagesCreatePostWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\Response';
        $request = $this->aigcImagesCreatePostRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation aigcImagesCreatePostAsync
     *
     * aigc预测
     *
     * @param  \Swagger\Client\Model\AIGCCreatRequest $body aigc预测body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aigcImagesCreatePostAsync($body)
    {
        return $this->aigcImagesCreatePostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation aigcImagesCreatePostAsyncWithHttpInfo
     *
     * aigc预测
     *
     * @param  \Swagger\Client\Model\AIGCCreatRequest $body aigc预测body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aigcImagesCreatePostAsyncWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\Response';
        $request = $this->aigcImagesCreatePostRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'aigcImagesCreatePost'
     *
     * @param  \Swagger\Client\Model\AIGCCreatRequest $body aigc预测body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function aigcImagesCreatePostRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling aigcImagesCreatePost'
            );
        }

        $resourcePath = '/api/v1/aigc_images/create';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $sign = $this->config->createSign($resourcePath, 'POST', $httpBody, $queryParams);
        $headers['Authorization'] = $this->config->getAppId() . ":"  .  $sign;
        // this endpoint requires API key authentication
        $headers['X-Request-Time'] = time();

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
    /**
     * aigc AI写真训练
     * @param [] $images 训练的图片列表
     * @param mixed[] $config 参数配置
     * @param string $modelName 自定义的模型名称，默认为空
     *  
     */
    public function aigcImagesTrain($images,  $config=[], $modelName = '') {
        $request = new AIGCTrainRequest();
        $request->setImages($images);
        $request->setAction("AIGCImageTrain");
        $request->setModelName($modelName);
        $request->setConfigure((object)$config);

        return $this->aigcImagesTrainPost($request);
    }

    /**
     * Operation aigcImagesTrainPost
     *
     * aigc图像
     *
     * @param  \Swagger\Client\Model\AIGCTrainRequest $body aigc图像body (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse200
     */
    public function aigcImagesTrainPost($body)
    {
        list($response) = $this->aigcImagesTrainPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation aigcImagesTrainPostWithHttpInfo
     *
     * aigc图像
     *
     * @param  \Swagger\Client\Model\AIGCTrainRequest $body aigc图像body (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     */
    public function aigcImagesTrainPostWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->aigcImagesTrainPostRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse200',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation aigcImagesTrainPostAsync
     *
     * aigc图像
     *
     * @param  \Swagger\Client\Model\AIGCTrainRequest $body aigc图像body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aigcImagesTrainPostAsync($body)
    {
        return $this->aigcImagesTrainPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation aigcImagesTrainPostAsyncWithHttpInfo
     *
     * aigc图像
     *
     * @param  \Swagger\Client\Model\AIGCTrainRequest $body aigc图像body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function aigcImagesTrainPostAsyncWithHttpInfo($body)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->aigcImagesTrainPostRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'aigcImagesTrainPost'
     *
     * @param  \Swagger\Client\Model\AIGCTrainRequest $body aigc图像body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function aigcImagesTrainPostRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling aigcImagesTrainPost'
            );
        }

        $resourcePath = '/api/v1/aigc_images/train';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $sign = $this->config->createSign($resourcePath, 'POST', $httpBody, $queryParams);
        $headers['Authorization'] = $this->config->getAppId() . ":"  .  $sign;
        // this endpoint requires API key authentication
        $headers['X-Request-Time'] = time();

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
