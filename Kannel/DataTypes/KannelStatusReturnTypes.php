<?php

namespace Kannel\DataTypes;

use Exceptions\DataTypeException;
use SystemDefined\KannelConst;

class KannelStatusReturnTypes
{
    /** @var $attributes string[] Kannel status response supported types */
    protected static $attributes =
        [
            KannelConst::VERSION_RESPONSE_KEY,
            KannelConst::STATUS_RESPONSE_KEY,
            KannelConst::WDP_RESPONSE_KEY,
            KannelConst::SMS_RESPONSE_KEY,
            KannelConst::DLR_RESPONSE_KEY,
            KannelConst::BOXES_RESPONSE_KEY,
            KannelConst::SMSCS_RESPONSE_KEY,
        ];

    /**
     * @param string $type
     * @return bool
     * @throws DataTypeException
     */
    public function __construct(string $type)
    {
        if(in_array($type, static::$attributes)){
            return true;
        }

        throw new DataTypeException($type, KannelConst::NOT_SUPPORTED_RESPONSE_TYPE);
    }
}