<?php

namespace Ms100\OpenWps\Requests;

use Ms100\OpenWps\Config;
use Ms100\OpenWps\Provider;
use Ms100\OpenWps\WpsException;

abstract class Request
{
    protected $user_agent = '';
    protected $token = '';
    protected $file_id = '';
    protected $appid = '';
    protected $signature = '';
    protected $config;
    protected $query_array = [];

    public function __construct(Config $config)
    {
        $this->config = $config;


        $this->file_id = $_SERVER['HTTP_X_WEBOFFICE_FILE_ID'] ?? '';
        $this->token = $_SERVER['HTTP_X_WPS_WEBOFFICE_TOKEN'] ?? '';
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $this->signature = $_GET['_w_signature'] ?? '';
        $this->appid = $_GET['_w_appid'] ?? '';
        $this->query_array = $_GET ?? [];

        $this->checkUserAgent();
        $this->checkAppid();
        $this->checkFileId();
        $this->checkSignature();
    }

    protected function checkUserAgent()
    {
        if ($this->user_agent != 'weboffice-httpclient') {
            throw new WpsException('user-agent 不合法', 1);
        }
    }

    protected function checkAppid()
    {
        if ($this->appid != $this->config->getAppId()) {
            throw new WpsException('appid 不合法', 1);
        }
    }

    protected function checkFileId()
    {
        if (empty($this->file_id)) {
            throw new WpsException('file_id 不合法', 1);
        }
    }

    protected function checkSignature()
    {
        return Provider::checkSignature(
            $this->query_array,
            $this->config->getAppSecret()
        );
    }

    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed|null
     */
    public function getQueryParam(string $key, $default = null)
    {
        return $this->query_array[$key] ?? $default;
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return mixed|string
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * @return mixed|string
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @return mixed|string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }
}