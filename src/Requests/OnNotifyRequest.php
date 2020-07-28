<?php

namespace Ms100\OpenWps\Requests;

use Ms100\OpenWps\Config;
use Ms100\OpenWps\WpsException;

class OnNotifyRequest extends Request
{
    protected $cmd = '';
    protected $body = [];

    public function __construct(Config $config)
    {
        parent::__construct($config);

        $post = json_decode(file_get_contents('php://input'), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new WpsException('json格式错误', 1);
        }

        $this->cmd = $post['cmd'] ?? '';
        $this->body = $post['body'] ?? [];
    }

    /**
     * @return string
     */
    public function getCmd(): string
    {
        return $this->cmd;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }
}