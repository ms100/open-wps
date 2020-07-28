<?php

namespace Ms100\OpenWps;

use Ms100\OpenWps\Requests\FileHistoryRequest;
use Ms100\OpenWps\Requests\FileInfoRequest;
use Ms100\OpenWps\Requests\FileNewRequest;
use Ms100\OpenWps\Requests\FileOnlineRequest;
use Ms100\OpenWps\Requests\FileRenameRequest;
use Ms100\OpenWps\Requests\FileSaveRequest;
use Ms100\OpenWps\Requests\FileVersionRequest;
use Ms100\OpenWps\Requests\OnNotifyRequest;
use Ms100\OpenWps\Requests\UserInfoRequest;
use Ms100\OpenWps\Responses\ErrorResponse;

class Manager
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var HandlerInterface
     */
    protected $handler;

    public function __construct(Config $config, HandlerInterface $handler)
    {
        $this->config = $config;
        $this->handler = $handler;
    }

    public function handleRequest(string $path)
    {
        try {
            switch ($path) {
                case '/v1/3rd/file/info'    :
                    $request = new FileInfoRequest($this->config);
                    $handler_method = 'fileInfo';
                    break;
                case '/v1/3rd/user/info'    :
                    $request = new UserInfoRequest($this->config);
                    $handler_method = 'userInfo';
                    break;
                case '/v1/3rd/file/online'  :
                    $request = new FileOnlineRequest($this->config);
                    $handler_method = 'fileOnline';
                    break;
                case '/v1/3rd/file/save'    :
                    $request = new FileSaveRequest($this->config);
                    $handler_method = 'fileSave';
                    break;
                case '/v1/3rd/file/rename'  :
                    $request = new FileRenameRequest($this->config);
                    $handler_method = 'fileRename';
                    break;
                case '/v1/3rd/file/history' :
                    $request = new FileHistoryRequest($this->config);
                    $handler_method = 'fileHistory';
                    break;
                case '/v1/3rd/file/new'     :
                    $request = new FileNewRequest($this->config);
                    $handler_method = 'fileNew';
                    break;
                case '/v1/3rd/onnotify'     :
                    $request = new OnNotifyRequest($this->config);
                    $handler_method = 'onNotify';
                    break;
                default:
                    if (strncmp($path, '/v1/3rd/file/version/', 21) === 0) {
                        $version = substr($path, 21);
                        $request = new FileVersionRequest(
                            $this->config,
                            $version
                        );
                        $handler_method = 'fileVersion';
                        break;
                    }
                    throw new WpsException('未知请求', 1);
            }

            if ($this->config->isNeedToken()) {
                $this->handler->parseToken($request);
            }

            $response = $this->handler->{$handler_method}($request);
        } catch (\Exception $e) {
            $response = new ErrorResponse($e->getCode(), $e->getMessage());
        }

        return $response;
    }

    public function renderPage(
        Page $page,
        string $page_path = ''
    ) {
        return $page->render($page_path);
    }

}
