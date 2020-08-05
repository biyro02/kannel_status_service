<?php

namespace Kannel\DataTypes;

use Exceptions\DataTypeException;
use SystemDefined\KannelConst;

class KannelUri
{
    protected $host = null;
    protected $port = null;
    protected $password = null;
    protected $subUrl = KannelConst::STATUS_XML_SUB_URL;
    protected $protocol = KannelConst::PROTOCOL;

    /** they will be used only this class */
    const PORT_GLUE = ":";
    const SUB_URL_GLUE = "/";
    const PASSWORD_GLUE = "?password=";

    /**
     * KannelUri constructor.
     * @param $host
     * @param $port
     * @param $password
     * @param null $subUrl
     * @param null $protocol
     * @throws DataTypeException
     */
    public function __construct($host, $port, $password, $subUrl = null, $protocol = null)
    {
        $this->setProtocol($protocol)
             ->setHost($host)
             ->setPort($port)
             ->setSubUrl($subUrl)
             ->setPassword($password);
    }

    /**
     * @param $protocol
     * @return $this
     */
    public function setProtocol($protocol)
    {
        if(!is_null($protocol))
            $this->protocol = $protocol;
        return $this;
    }

    /**
     * @param $host
     * @return $this
     * @throws DataTypeException
     */
    public function setHost($host)
    {
        if(!is_null($host)){
            $this->host = $host;
            return $this;
        }
        throw new DataTypeException($host,KannelConst::HOST_PARAMETER_REQUIRED);
    }

    /**
     * @param $port
     * @return $this
     * @throws DataTypeException
     */
    public function setPort($port)
    {
        if(!is_null($port) && is_int($port)){
            $this->port = $port;
            return $this;
        }
        throw new DataTypeException($port,KannelConst::PORT_PARAMETER_REQUIRED);
    }

    /**
     * @param $subUrl
     * @return $this
     */
    public function setSubUrl($subUrl)
    {
        if(!is_null($subUrl)){
            $this->subUrl = $subUrl;
        }
        return $this;
    }

    /**
     * @param $password
     * @return $this
     * @throws DataTypeException
     */
    public function setPassword($password)
    {
        if(!is_null($password)){
            $this->password = $password;
            return $this;
        }
        throw new DataTypeException($password,KannelConst::PASSWORD_PARAMETER_REQUIRED);
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @return null
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return null
     */
    public function getPort()
    {
        return self::PORT_GLUE . $this->port;
    }

    /**
     * @return mixed
     */
    private function getSubUrl()
    {
        return self::SUB_URL_GLUE . $this->subUrl;
    }

    /**
     * @return mixed|string
     */
    public function getPassword()
    {
        return self::PASSWORD_GLUE . $this->password;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->getProtocol()
             . $this->getHost()
             . $this->getPort()
             . $this->getSubUrl()
             . $this->getPassword();
    }
}