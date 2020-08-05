<?php

namespace Kannel\Services;

use Exceptions\DataTypeException;
use Exceptions\KannelRequestException;
use Kannel\Collections\StatusXmlCollection;
use Kannel\DataTypes\KannelUri;
use Kannel\DataTypes\XmlDataType;
use SystemDefined\SystemConfig;

class KannelStatusService
{
    /** @var KannelUri|null */
    private $uriObj = null;
    /** @var KannelStatusRequest|null  */
    private $kannelService = null;

    /**
     * KannelStatusService constructor.
     * Host, port and password should be taken by environment (.env)
     *
     * @param null $host
     * @param null $port
     * @param null $password
     * @throws DataTypeException
     */
    public function __construct($host = null, $port = null, $password = null)
    {
        return $this
            ->setKannelUriObj($host, $port, $password)
            ->connectKannel();
    }

    /**
     * @param null $host
     * @param null $port
     * @param null $password
     * @return $this
     * @throws DataTypeException
     */
    public function setKannelUriObj($host = null, $port = null, $password = null)
    {
        $host = $host ?? SystemConfig::HOST;
        $port = $port ?? SystemConfig::PORT;
        $password = $password ?? SystemConfig::PASSWORD;

        $this->uriObj = new KannelUri($host, $port, $password);

        return $this;
    }

    /**
     * @return $this
     */
    public function connectKannel()
    {
        $this->kannelService = new KannelStatusRequest($this->uriObj);
        return $this;
    }

    /**
     * @return StatusXmlCollection
     * @throws KannelRequestException
     * @throws DataTypeException
     */
    public function getKannelStatus()
    {
        $raw = $this->kannelService->get();
        $xml = new XmlDataType($raw);
        return new StatusXmlCollection($xml);
    }

    /**
     * There is no post, this is sample
     *
     * @param $body
     * @return mixed
     */
    public function postKannelSms($body)
    {
        return $this->kannelService->post(null, $body);
    }
}