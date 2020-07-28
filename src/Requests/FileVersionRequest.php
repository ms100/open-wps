<?php

namespace Ms100\OpenWps\Requests;

use Ms100\OpenWps\Config;

class FileVersionRequest extends Request
{
    protected $version = '';

    public function __construct(Config $config, string $version)
    {
        parent::__construct($config);

        $this->version = $version ?? '';
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

}