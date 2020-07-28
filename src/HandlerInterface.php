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
use Ms100\OpenWps\Requests\Request;
use Ms100\OpenWps\Requests\UserInfoRequest;
use Ms100\OpenWps\Responses\FileHistoryResponse;
use Ms100\OpenWps\Responses\FileInfoResponse;
use Ms100\OpenWps\Responses\FileNewResponse;
use Ms100\OpenWps\Responses\FileOnlineResponse;
use Ms100\OpenWps\Responses\FileRenameResponse;
use Ms100\OpenWps\Responses\FileSaveResponse;
use Ms100\OpenWps\Responses\FileVersionResponse;
use Ms100\OpenWps\Responses\OnNotifyResponse;
use Ms100\OpenWps\Responses\UserInfoResponse;

interface HandlerInterface
{

    public function fileInfo(FileInfoRequest $request): FileInfoResponse;

    public function userInfo(UserInfoRequest $request): UserInfoResponse;

    public function fileOnline(FileOnlineRequest $request): FileOnlineResponse;

    public function fileSave(FileSaveRequest $request): FileSaveResponse;

    public function fileVersion(FileVersionRequest $request): FileVersionResponse;

    public function fileRename(FileRenameRequest $request): FileRenameResponse;

    public function fileHistory(FileHistoryRequest $request): FileHistoryResponse;

    public function fileNew(FileNewRequest $request): FileNewResponse;

    public function onNotify(OnNotifyRequest $request): OnNotifyResponse;

    public function makeToken($param = null): string;

    public function parseToken(Request $request): self;
}