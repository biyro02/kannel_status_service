<?php

namespace Kannel\DataTypes;

use Exceptions\DataTypeException;
use SystemDefined\KannelConst;

class XmlDataType
{
    /** @var \SimpleXMLElement|null */
    private $data = null;

    /**
     * XmlDataType constructor.
     * @param $data
     * @throws DataTypeException
     */
    public function __construct(string $data)
    {
        if(!simplexml_load_string($data) instanceof \SimpleXMLElement){
            throw new DataTypeException($data, KannelConst::FILE_EXTENSION_IS_NOT_AN_XML_SAMPLE);
        }
        $this->data = simplexml_load_string($data);
    }

    /**
     * @return \SimpleXMLElement|null
     */
    public function getData()
    {
        return $this->data;
    }
}