<?php

namespace Exceptions;

use SystemDefined\KannelConst;

class DataTypeException extends \Exception
{
    private $data = null;

    /** @var string This is standard message */
    protected $message = KannelConst::WRONG_DATA_TYPE_EXCEPTION;

    /**
     * DataTypeException constructor.
     *
     * @param null $data
     * @param null $message
     */
    public function __construct($data = null, $message = null)
    {
        $this->setData($data);
        if(!is_null($message)){
            $this->message .= " ".$message;
        }
        parent::__construct($this->message);
    }

    /**
     * @param mixed|null $data
     */
    private function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }
}