<?php

namespace Ms100\OpenWps\Responses;

class FileNewResponse extends Response
{
    protected $redirect_url = '';
    protected $user_id = '';

    /**
     * FileNewResponse constructor.
     *
     * @param string $redirect_url
     * @param string $user_id
     */
    public function __construct(string $redirect_url, string $user_id)
    {
        $this->redirect_url = $redirect_url;
        $this->user_id = $user_id;
    }

    public function jsonSerialize()
    {
        return [
            'redirect_url' => $this->redirect_url,
            'user_id' => $this->user_id,
        ];
    }
}
