<?php

namespace Ms100\OpenWps\Responses;

use Ms100\OpenWps\Entities\FileHistory;

class FileHistoryResponse extends Response
{
    /**
     * @var FileHistory[]
     */
    protected $histories = [];

    public function __construct(array $histories = [])
    {
        $this->histories = $histories;
    }

    public function addHistory(FileHistory $history)
    {
        $this->histories[] = $history;
    }

    public function jsonSerialize()
    {
        return [
            'histories' => $this->histories,
        ];
    }
}
