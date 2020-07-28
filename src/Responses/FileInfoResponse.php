<?php

namespace Ms100\OpenWps\Responses;

use Ms100\OpenWps\Entities\File;
use Ms100\OpenWps\Entities\User;
use Ms100\OpenWps\Entities\UserAcl;
use Ms100\OpenWps\Entities\Watermark;

/**
 * Class WpsFile
 *
 * @package App\entities
 */
class FileInfoResponse extends Response
{
    /**
     * @var File
     */
    protected $file;

    /**
     * @var User
     */
    protected $user;

    /**
     * FileInfo constructor.
     *
     * @param File $file
     * @param User $user
     * @param UserAcl $useracl
     * @param Watermark $watermark
     */
    public function __construct(
        File $file,
        User $user,
        UserAcl $useracl,
        Watermark $watermark
    ) {
        $this->file = $file;
        $this->user = $user;
        $this->file->setUserAcl($useracl);
        $this->file->setWatermark($watermark);
    }

    public function jsonSerialize()
    {
        return [
            'file' => $this->file,
            'user' => $this->user,
        ];
    }
}
