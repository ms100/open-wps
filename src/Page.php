<?php

namespace Ms100\OpenWps;

use Ms100\OpenWps\Entities\File;
use Ms100\OpenWps\PageAttributes\CommandBar;

class Page
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var File
     */
    protected $file;

    protected $token = '';
    protected $title = '';

    protected $wps_url_query_params = [];

    protected $js_sdk_type = 'umd';

    /**
     * @var CommandBar[]
     */
    protected $command_bars_setting = [];

    /**
     * Page constructor.
     *
     * @param Config $config
     * @param File $file
     */
    public function __construct(Config $config, File $file)
    {
        $this->config = $config;
        $this->file = $file;
    }

    /**
     * @param string $js_sdk_type
     */
    public function setJsSdkType(string $js_sdk_type)
    {
        $this->js_sdk_type = $js_sdk_type;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param CommandBar $command_bar_setting
     */
    public function addCommandBarsSetting(CommandBar $command_bar_setting)
    {
        $this->command_bars_setting[] = $command_bar_setting;
    }

    /**
     * @param array $wps_url_query_params
     */
    public function setWpsUrlQueryParams(array $wps_url_query_params)
    {
        $this->wps_url_query_params = $wps_url_query_params;
    }

    public function render(string $page_path = ''): string
    {
        ob_start();
        if (empty($page_path)) {
            include(__DIR__ . '/edit_page.html');
        } else {
            include($page_path);
        }

        return ob_get_clean();
    }

    protected function getJsSdk(): string
    {
        $file_path = __DIR__ . '/JsSDK/web-office-sdk-v1.1.1.'
            . $this->js_sdk_type . '.js';

        if (!file_exists($file_path)) {
            throw new WpsException('文件不存在', 1);
        }

        return file_get_contents($file_path);
    }

    protected function getTitle(): string
    {
        if ($this->title !== '') {
            return $this->title;
        } elseif (isset($this->file)) {
            return $this->file->getName();
        }

        return '';
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    protected function isNeedToken()
    {
        return $this->config->isNeedToken();
    }

    protected function getCommandBarsSettingStr(): string
    {
        return json_encode($this->command_bars_setting);
    }

    protected function getWpsUrl(): string
    {
        return Provider::makeWpsUrl(
            $this->config,
            $this->file,
            $this->wps_url_query_params
        );
    }


}