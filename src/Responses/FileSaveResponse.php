<?php

namespace Ms100\OpenWps\Responses;

use Ms100\OpenWps\Entities\File;

class FileSaveResponse extends Response
{
    /**
     * @var File
     */
    protected $file;

    /**
     * FileInfo constructor.
     *
     * @param File $file
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function jsonSerialize()
    {
        return [
            'file' => $this->file,
        ];
    }
}
