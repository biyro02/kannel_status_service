<?php

namespace Kannel\Services;

use Exceptions\KannelRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Kannel\DataTypes\KannelUri;
use SystemDefined\KannelConst;

class BaseKannelRequest
{
    protected $headers = [];
    /** @var Client|null */
    protected $httpClient = null;
    /** @var $kannelUri KannelUri|null */
    protected $kannelUri = null;

    const ACCEPT = "Accept";
    const HEADERS = "Headers";

    /**
     * BaseKannelRequest constructor.
     * @param KannelUri $kannelUriObj
     */
    public function __construct(KannelUri $kannelUriObj)
    {
        /** @var KannelUri */
        $this->kannelUri = $kannelUriObj;
        /** set headers */
        $this->headers[self::ACCEPT] = KannelConst::ACCEPT_XML;
        $this->headers["Content-Type"] = "application/json";
        /** @var Client create http client */
        $this->httpClient = new Client([
            self::HEADERS  => $this->headers,
        ]);
    }

    /**
     * @param $path
     * @param array $options
     * @return mixed
     * @throws KannelRequestException
     */
    public function get($path = null, array $options = [])
    {
        try{
            // $options is added for future.

            $route = $this->getFullUrl($path);
            $response = $this->httpClient->request(KannelConst::GET_METHOD_GUZZLE, $route, $this->headers);
            return $response->getBody()->getContents();
        } catch(\Exception $e) {
            throw new KannelRequestException(KannelConst::CODE_EXCEPTION_ON_REQUEST. $e->getMessage());
        } catch (GuzzleException $guzzleException) {
            throw new KannelRequestException(KannelConst::GUZZLE_EXCEPTION, $guzzleException->getMessage());
        }
    }

    /**
     * @param $path
     * @return string
     */
    protected function getFullUrl($path = null)
    {
//        return "https://reqbin.com/echo/get/xml";
        return $this
            ->kannelUri
            ->setSubUrl($path)
            ->getUri();
    }

    /**
     * @param null $path
     * @param array $body
     * @param array $options
     * @return mixed
     */
    public function post($path = null, $body = [], $options = [])
    {
        // TODO: write post method
    }

    public function patch($path = null, $body = [], $options = [])
    {
        // TODO: write patch method
    }

    public function delete($path)
    {
        // TODO: write delete method
    }
}
