<?php
/**
 * AIGCCreatRequest
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
 * AIGCCreatRequest Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AIGCCreatRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AIGCCreatRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'action' => 'string',
        'model_id' => 'string',
        'model_ids' => 'array',
        'model_name' => 'string',
        'template_image' => 'string',
        'configure' => 'object'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'action' => null,
        'model_id' => null,
        'model_ids' => null,
        'model_name' => null,
        'template_image' => null,
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
        'model_id' => 'model_id',
        'model_ids' => 'model_ids',
        'model_name' => 'model_name',
        'template_image' => 'template_image',
        'configure' => 'configure'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'action' => 'setAction',
        'model_id' => 'setModelId',
        'model_ids' => 'setModelIds',
        'model_name' => 'setModelName',
        'template_image' => 'setTemplateImage',
        'configure' => 'setConfigure'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'action' => 'getAction',
        'model_id' => 'getModelId',
        'model_ids' => 'getModelIds',
        'model_name' => 'getModelName',
        'template_image' => 'getTemplateImage',
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
        $this->container['model_id'] = isset($data['model_id']) ? $data['model_id'] : null;
        $this->container['model_ids'] = isset($data['model_ids']) ? $data['model_ids'] : null;
        $this->container['model_name'] = isset($data['model_name']) ? $data['model_name'] : null;
        $this->container['template_image'] = isset($data['template_image']) ? $data['template_image'] : null;
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
        if ($this->container['model_id'] === null && $this->container['model_ids'] === null) {
            $invalidProperties[] = "'model_id' can't be null";
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
     * Gets model_id
     *
     * @return string
     */
    public function getModelId()
    {
        return $this->container['model_id'];
    }

    public function getModelIds()
    {
        return $this->container['model_ids'];
    }

    /**
     * Sets model_id
     *
     * @param string $model_id model_id
     *
     * @return $this
     */
    public function setModelId($model_id)
    {
        $this->container['model_id'] = $model_id;

        return $this;
    }

    /**
     * @param array $model_ids
     */
    public function setModelIds($model_ids)
    {
        $this->container['model_ids'] = $model_ids;

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
     * Gets template_image
     *
     * @return string
     */
    public function getTemplateImage()
    {
        return $this->container['template_image'];
    }

    /**
     * Sets template_image
     *
     * @param string $template_image template_image
     *
     * @return $this
     */
    public function setTemplateImage($template_image)
    {
        $this->container['template_image'] = $template_image;

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
