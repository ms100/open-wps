<?php

namespace Ms100\OpenWps\Requests;

use Ms100\OpenWps\Config;
use Ms100\OpenWps\WpsException;

class FileSaveRequest extends Request
{
    protected $file_name = '';
    protected $file_path = '';
    protected $file_size = 0;

    public function __construct(Config $config)
    {
        parent::__construct($config);

        if (!isset($_FILES['file']) || !empty($_FILES['file']['error'])) {
            throw new WpsException('上传文件出错', 1);
        }
        $this->file_name = $_FILES['file']['name'];
        $this->file_path = $_FILES['file']['tmp_name'];
        $this->file_size = $_FILES['file']['size'];
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file_name;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->file_path;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->file_size;
    }

}