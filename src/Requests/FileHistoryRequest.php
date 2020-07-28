<?php

namespace Ms100\OpenWps\Requests;

use Ms100\OpenWps\Config;
use Ms100\OpenWps\WpsException;

class FileHistoryRequest extends Request
{
    protected $offset = 0;
    protected $count = 0;

    public function __construct(Config $config)
    {
        parent::__construct($config);

        $post = json_decode(file_get_contents('php://input'), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new WpsException('json格式错误', 1);
        }

        $this->offset = $post['offset'] ?? 0;
        $this->count = $post['count'] ?? 0;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }


}