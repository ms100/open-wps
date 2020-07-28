<?php

namespace Ms100\OpenWps\Responses;

class ErrorResponse extends Response
{
    protected $code = '';
    protected $msg = '';

    /**
     * ErrorResponse constructor.
     *
     * @param string $code
     * @param string $msg
     */
    public function __construct(string $code, string $msg)
    {
        $this->code = $code;
        $this->msg = $msg;
    }

    public function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'msg' => $this->msg,
        ];
    }
}
