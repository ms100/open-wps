<?php

namespace Ms100\OpenWps\Entities;


class User implements \JsonSerializable
{
    const PERMISSION_WRITE = 'write';
    const PERMISSION_READ = 'read';
    /**
     * 用户ID
     *
     * @var string
     */
    protected $id = '';
    /**
     * 用户名称
     *
     * @var string
     */
    protected $name = '';
    /**
     * 用户操作权限
     *
     * @var string
     */
    protected $permission = '';
    /**
     * 用户头像地址
     *
     * @var string
     */
    protected $avatar_url = '';

    public function __construct(
        string $id = '',
        string $name = '',
        string $permission = self::PERMISSION_WRITE,
        string $avatar_url = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->permission = $permission;
        $this->avatar_url = $avatar_url;
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
     * @return string
     */
    public function getPermission(): string
    {
        return $this->permission;
    }

    /**
     * @param string $permission
     */
    public function setPermission(string $permission)
    {
        $this->permission = $permission;
    }

    /**
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return $this->avatar_url;
    }

    /**
     * @param string $avatar_url
     */
    public function setAvatarUrl(string $avatar_url)
    {
        $this->avatar_url = $avatar_url;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'permission' => $this->permission,
            'avatar_url' => $this->avatar_url,
        ];
    }
}
