<?php

namespace Exceptions;

use SystemDefined\KannelConst;

class KannelRequestException extends DataTypeException
{
    protected $message = KannelConst::KANNEL_REQUEST_EXCEPTION;
}