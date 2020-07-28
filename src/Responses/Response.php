<?php

namespace Ms100\OpenWps\Responses;


abstract class Response implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return [];
    }
}
