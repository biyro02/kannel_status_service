<?php

namespace SystemDefined;

class KannelConst
{
    /** kannel uri keys */
    const PROTOCOL = "https://";
    const STATUS_XML_SUB_URL = "status.xml";

    /** accepted response keys */
    const VERSION_RESPONSE_KEY = "status";
    const STATUS_RESPONSE_KEY = "status";
    const WDP_RESPONSE_KEY = "wdp";
    const SMS_RESPONSE_KEY = "sms";
    const DLR_RESPONSE_KEY = "dlr";
    const BOXES_RESPONSE_KEY = "boxes";
    const SMSCS_RESPONSE_KEY = "smscs";

    /** about xml processes */
    const XML_START = "<?xml";
    const ACCEPT_XML = "application/xml";

    /** guzzle preferred method types */
    const GET_METHOD_GUZZLE = "GET";
    const POST_METHOD_GUZZLE = "POST";
    const PATCH_METHOD_GUZZLE = "PATCH";
    const DELETE_METHOD_GUZZLE = "DELETE";

    /** system messages */
    const HOST_PARAMETER_REQUIRED = "Host parameter is required!";
    const PASSWORD_PARAMETER_REQUIRED = "Password parameter is required!";
    const PORT_PARAMETER_REQUIRED = "Port parameter is required and must be an integer value!";
    const CODE_EXCEPTION_ON_REQUEST = "There is a code exception! Please check your code! ";
    const GUZZLE_EXCEPTION = "There is a guzzle exception. Check detail: ";
    const WRONG_DATA_TYPE_EXCEPTION = "There is wrong data type founded.";
    const KANNEL_REQUEST_EXCEPTION = "There is a request exception. Please check the detail.";
    const NOT_SUPPORTED_RESPONSE_TYPE = "This type is not included by Kannel Status Return Types. Please check your parameter!";
    const FILE_EXTENSION_IS_NOT_AN_XML_SAMPLE = "File extension is is not an xml sample!";

}