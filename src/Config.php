<?php

namespace Ms100\OpenWps;

class Config
{

    protected $appid = '';
    protected $appsecret = '';
    protected $need_token = false;

    /**
     * Config constructor.
     * @param string $appid
     * @param string $appsecret
     * @param bool $need_token
     */
    public function __construct(
        string $appid,
        string $appsecret,
        bool $need_token = false
    ) {
        $this->appid = $appid;
        $this->appsecret = $appsecret;
        $this->need_token = $need_token;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appid;
    }

    /**
     * @return string
     */
    public function getAppSecret(): string
    {
        return $this->appsecret;
    }

    /**
     * @return bool
     */
    public function isNeedToken(): bool
    {
        return $this->need_token;
    }

}
