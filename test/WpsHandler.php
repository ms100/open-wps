<?php

use Ms100\OpenWps\HandlerInterface;

class WpsHandler implements HandlerInterface
{
    public function fileInfo(
        \Ms100\OpenWps\Requests\FileInfoRequest $request
    ): \Ms100\OpenWps\Responses\FileInfoResponse {
        // TODO: Implement fileInfo() method.
    }

    public function userInfo(
        \Ms100\OpenWps\Requests\UserInfoRequest $request
    ): \Ms100\OpenWps\Responses\UserInfoResponse {
        // TODO: Implement userInfo() method.
    }

    public function fileOnline(
        \Ms100\OpenWps\Requests\FileOnlineRequest $request
    ): \Ms100\OpenWps\Responses\FileOnlineResponse {
        // TODO: Implement fileOnline() method.
    }

    public function fileSave(
        \Ms100\OpenWps\Requests\FileSaveRequest $request
    ): \Ms100\OpenWps\Responses\FileSaveResponse {
        // TODO: Implement fileSave() method.
    }

    public function fileVersion(
        \Ms100\OpenWps\Requests\FileVersionRequest $request
    ): \Ms100\OpenWps\Responses\FileVersionResponse {
        // TODO: Implement fileVersion() method.
    }

    public function fileRename(
        \Ms100\OpenWps\Requests\FileRenameRequest $request
    ): \Ms100\OpenWps\Responses\FileRenameResponse {
        // TODO: Implement fileRename() method.
    }

    public function fileHistory(
        \Ms100\OpenWps\Requests\FileHistoryRequest $request
    ): \Ms100\OpenWps\Responses\FileHistoryResponse {
        // TODO: Implement fileHistory() method.
    }

    public function fileNew(\Ms100\OpenWps\Requests\FileNewRequest $request): \Ms100\OpenWps\Responses\FileNewResponse
    {
        // TODO: Implement fileNew() method.
    }

    public function onNotify(
        \Ms100\OpenWps\Requests\OnNotifyRequest $request
    ): \Ms100\OpenWps\Responses\OnNotifyResponse {
        // TODO: Implement onNotify() method.
    }

    public function makeToken($param = null): string
    {
        // TODO: Implement makeToken() method.
    }

    public function parseToken(\Ms100\OpenWps\Requests\Request $request): HandlerInterface
    {
        // TODO: Implement parseToken() method.
    }

}