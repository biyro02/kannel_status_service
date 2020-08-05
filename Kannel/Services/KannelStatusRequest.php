<?php

namespace Kannel\Services;

use SystemDefined\KannelConst;

class KannelStatusRequest extends BaseKannelRequest
{
    /** @var string This attribute will use as sub url */
    protected $path = KannelConst::STATUS_XML_SUB_URL;

    // TODO: According to the need, the guzzle methods(GET, POST etc.) can be overwrite
}