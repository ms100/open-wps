<?php

namespace Ms100\OpenWps\Requests;

use Ms100\OpenWps\Config;
use Ms100\OpenWps\WpsException;

class FileRenameRequest extends Request
{
    protected $file_name = '';

    public function __construct(Config $config)
    {
        parent::__construct($config);

        $post = json_decode(file_get_contents('php://input'), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new WpsException('json格式错误', 1);
        }

        $this->file_name = $post['name'] ?? '文件';
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file_name;
    }

}