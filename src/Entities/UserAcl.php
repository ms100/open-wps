<?php

namespace Ms100\OpenWps\Entities;

/**
 * Class UserAcl 用户权限
 *
 * @package Ms100\OpenWps\Entities
 */
class UserAcl implements \JsonSerializable
{
    protected $rename = false;     //重命名权限，1为打开该权限，0为关闭该权限，默认为0
    protected $history = false;    //历史版本权限，1为打开该权限，0为关闭该权限,默认为1
    protected $copy = false;       //复制
    protected $export = false;     //导出PDF
    protected $print = false;      //打印

    public function __construct(
        bool $rename = false,
        bool $history = false,
        bool $copy = false,
        bool $export = false,
        bool $print = false
    ) {
        $this->rename = $rename;
        $this->history = $history;
        $this->copy = $copy;
        $this->export = $export;
        $this->print = $print;
    }


    public function rename(bool $bool)
    {
        $this->rename = $bool;
    }


    public function history(bool $bool)
    {
        $this->history = $bool;
    }


    public function copy(bool $bool)
    {
        $this->copy = $bool;
    }


    public function export(bool $bool)
    {
        $this->export = $bool;
    }


    public function print(bool $bool)
    {
        $this->print = $bool;
    }

    /**
     * @return bool
     */
    public function canRename(): bool
    {
        return $this->rename;
    }

    /**
     * @return bool
     */
    public function canHistory(): bool
    {
        return $this->history;
    }

    /**
     * @return bool
     */
    public function canCopy(): bool
    {
        return $this->copy;
    }

    /**
     * @return bool
     */
    public function canExport(): bool
    {
        return $this->export;
    }

    /**
     * @return bool
     */
    public function canPrint(): bool
    {
        return $this->print;
    }

    public function jsonSerialize()
    {
        return [
            'rename' => (int)$this->rename,
            'history' => (int)$this->history,
            'copy' => (int)$this->copy,
            'export' => (int)$this->export,
            'print' => (int)$this->print,
        ];
    }

}