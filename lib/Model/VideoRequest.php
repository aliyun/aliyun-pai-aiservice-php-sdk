<?php
/**
 * VideoRequest
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * VideoRequest Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class VideoRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'VideoRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'action' => 'string',
        'video_url' => 'string',
        'video_title' => 'string',
        'model_name' => 'string',
        'configure' => 'object'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'action' => null,
        'video_url' => null,
        'video_title' => null,
        'model_name' => null,
        'configure' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'action' => 'action',
        'video_url' => 'video_url',
        'video_title' => 'video_title',
        'model_name' => 'model_name',
        'configure' => 'configure'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'action' => 'setAction',
        'video_url' => 'setVideoUrl',
        'video_title' => 'setVideoTitle',
        'model_name' => 'setModelName',
        'configure' => 'setConfigure'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'action' => 'getAction',
        'video_url' => 'getVideoUrl',
        'video_title' => 'getVideoTitle',
        'model_name' => 'getModelName',
        'configure' => 'getConfigure'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }



    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['action'] = isset($data['action']) ? $data['action'] : null;
        $this->container['video_url'] = isset($data['video_url']) ? $data['video_url'] : null;
        $this->container['video_title'] = isset($data['video_title']) ? $data['video_title'] : null;
        $this->container['model_name'] = isset($data['model_name']) ? $data['model_name'] : null;
        $this->container['configure'] = isset($data['configure']) ? $data['configure'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['action'] === null) {
            $invalidProperties[] = "'action' can't be null";
        }
        if ($this->container['video_url'] === null) {
            $invalidProperties[] = "'video_url' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->container['action'];
    }

    /**
     * Sets action
     *
     * @param string $action action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->container['action'] = $action;

        return $this;
    }

    /**
     * Gets video_url
     *
     * @return string
     */
    public function getVideoUrl()
    {
        return $this->container['video_url'];
    }

    /**
     * Sets video_url
     *
     * @param string $video_url video_url
     *
     * @return $this
     */
    public function setVideoUrl($video_url)
    {
        $this->container['video_url'] = $video_url;

        return $this;
    }

    /**
     * Gets video_title
     *
     * @return string
     */
    public function getVideoTitle()
    {
        return $this->container['video_title'];
    }

    /**
     * Sets video_title
     *
     * @param string $video_title video_title
     *
     * @return $this
     */
    public function setVideoTitle($video_title)
    {
        $this->container['video_title'] = $video_title;

        return $this;
    }

    /**
     * Gets model_name
     *
     * @return string
     */
    public function getModelName()
    {
        return $this->container['model_name'];
    }

    /**
     * Sets model_name
     *
     * @param string $model_name model_name
     *
     * @return $this
     */
    public function setModelName($model_name)
    {
        $this->container['model_name'] = $model_name;

        return $this;
    }

    /**
     * Gets configure
     *
     * @return object
     */
    public function getConfigure()
    {
        return $this->container['configure'];
    }

    /**
     * Sets configure
     *
     * @param object $configure configure
     *
     * @return $this
     */
    public function setConfigure($configure)
    {
        $this->container['configure'] = $configure;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
