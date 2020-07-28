<?php

namespace Ms100\OpenWps\Requests;

use Ms100\OpenWps\Config;
use Ms100\OpenWps\WpsException;

class FileOnlineRequest extends Request
{
    protected $ids = [];

    public function __construct(Config $config)
    {
        parent::__construct($config);

        $post = json_decode(file_get_contents('php://input'), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new WpsException('json格式错误', 1);
        }

        $this->ids = $post['ids'] ?? [];
    }

    /**
     * @return array
     */
    public function getIds(): array
    {
        return $this->ids;
    }
}