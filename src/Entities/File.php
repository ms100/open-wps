<?php


namespace Ms100\OpenWps\Entities;

/**
 * Class WpsFile
 *
 * @package App\entities
 */
class File implements \JsonSerializable
{
    /**
     * 文件ID
     *
     * @var string
     */
    protected $id = '';

    /**
     * 文件名称
     *
     * @var string
     */
    protected $name = '';

    /**
     * 版本号
     *
     * @var int
     */
    protected $version = 0;

    /**
     * 文件大小，单位为B
     *
     * @var int
     */
    protected $size = 0;

    /**
     * 创建人ID
     *
     * @var string
     */
    protected $creator = '';

    /**
     * 创建时间
     *
     * @var int
     */
    protected $create_time = 0;

    /**
     * 修改人ID
     *
     * @var string
     */
    protected $modifier = '';

    /**
     * 修改时间
     *
     * @var int
     */
    protected $modify_time = 0;

    /**
     * 下载地址
     *
     * @var string
     */
    protected $download_url = '';

    /**
     * @var UserAcl
     */
    protected $user_acl;

    /**
     * @var Watermark
     */
    protected $watermark;


    public function __construct(
        string $id = '',
        string $name = '',
        int $version = 0,
        int $size = 0,
        string $creator = '',
        int $create_time = 0,
        string $modifier = '',
        int $modify_time = 0,
        string $download_url = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->version = $version;
        $this->size = $size;
        $this->creator = $creator;
        $this->create_time = $create_time;
        $this->modifier = $modifier;
        $this->modify_time = $modify_time;
        $this->download_url = $download_url;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion(int $version)
    {
        $this->version = $version;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @param string $creator
     */
    public function setCreator(string $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return int
     */
    public function getCreateTime(): int
    {
        return $this->create_time;
    }

    /**
     * @param int $create_time
     */
    public function setCreateTime(int $create_time)
    {
        $this->create_time = $create_time;
    }

    /**
     * @return string
     */
    public function getModifier(): string
    {
        return $this->modifier;
    }

    /**
     * @param string $modifier
     */
    public function setModifier(string $modifier)
    {
        $this->modifier = $modifier;
    }

    /**
     * @return int
     */
    public function getModifyTime(): int
    {
        return $this->modify_time;
    }

    /**
     * @param int $modify_time
     */
    public function setModifyTime(int $modify_time)
    {
        $this->modify_time = $modify_time;
    }

    /**
     * @return string
     */
    public function getDownloadUrl(): string
    {
        return $this->download_url;
    }

    /**
     * @param string $download_url
     */
    public function setDownloadUrl(string $download_url)
    {
        $this->download_url = $download_url;
    }

    /**
     * @return UserAcl
     */
    public function getUserAcl(): UserAcl
    {
        return $this->user_acl;
    }

    /**
     * @param UserAcl $user_acl
     */
    public function setUserAcl(UserAcl $user_acl)
    {
        $this->user_acl = $user_acl;
    }

    /**
     * @return Watermark
     */
    public function getWatermark(): Watermark
    {
        return $this->watermark;
    }

    /**
     * @param Watermark $watermark
     */
    public function setWatermark(Watermark $watermark)
    {
        $this->watermark = $watermark;
    }

    public function jsonSerialize()
    {
        $json = [
            'id' => $this->id,
            'name' => $this->name,
            'version' => $this->version,
            'size' => $this->size,
            'creator' => $this->creator,
            'create_time' => $this->create_time,
            'modifier' => $this->modifier,
            'modify_time' => $this->modify_time,
            'download_url' => $this->download_url,
        ];
        if (isset($this->user_acl)) {
            $json['user_acl'] = $this->user_acl;
        }
        if (isset($this->watermark)) {
            $json['watermark'] = $this->watermark;
        }

        return $json;
    }
}
