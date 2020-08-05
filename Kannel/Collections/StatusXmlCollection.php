<?php

namespace Kannel\Collections;

use Exceptions\DataTypeException;
use Kannel\DataTypes\KannelStatusReturnTypes;
use Kannel\DataTypes\XmlDataType;
use SystemDefined\KannelConst;

/**
 * Class StatusXmlCollection
 * @package Kannel\Collections
 */
class StatusXmlCollection implements \ArrayAccess
{
    /** @var $xmlObject object */
    private $xmlObject = null;

    /**
     * StatusXmlCollection constructor.
     * @param $statusXml
     */
    public function __construct(XmlDataType $statusXml)
    {
        $array = json_decode(json_encode((array) $statusXml->getData()), 1);
        $this->xmlObject = json_decode(json_encode($array), FALSE);
    }

    /**
     * @return array
     * @throws DataTypeException
     */
    public function getBoxes()
    {
        return $this->getProperty(KannelConst::BOXES_RESPONSE_KEY);
    }

    /**
     * @return mixed
     * @throws DataTypeException
     */
    public function getStatus() :string
    {
        return $this->getProperty(KannelConst::STATUS_RESPONSE_KEY);
    }

    /**
     * @return mixed
     * @throws DataTypeException
     */
    public function getVersion()
    {
        return $this->getProperty(KannelConst::VERSION_RESPONSE_KEY);
    }

    /**
     * @return mixed
     * @throws DataTypeException
     */
    public function getWdp()
    {
        return $this->getProperty(KannelConst::WDP_RESPONSE_KEY);
    }

    /**
     * @return mixed
     * @throws DataTypeException
     */
    public function getSms()
    {
        return $this->getProperty(KannelConst::SMS_RESPONSE_KEY);
    }

    /**
     * @return array
     * @throws DataTypeException
     */
    public function getSmscs()
    {
        return $this->getProperty(KannelConst::SMSCS_RESPONSE_KEY);
    }

    /**
     * @return string
     * @throws DataTypeException
     */
    public function getDlr() :string
    {
        return $this->getProperty(KannelConst::DLR_RESPONSE_KEY);
    }

    /**
     * @param $propertyName
     * @return mixed
     * @throws DataTypeException
     */
    protected function getProperty(string $propertyName)
    {
//        $propertyName = "ResponseMessage";
        $this->offsetExists($propertyName);
        return $this->offsetGet($propertyName);
    }

    /**
     * @param mixed $offset
     * @return bool
     * @throws DataTypeException
     */
    public function offsetExists($offset)
    {
        return isset($this->xmlObject->$offset) && new KannelStatusReturnTypes($offset);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->xmlObject->$offset;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}