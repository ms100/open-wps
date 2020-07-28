<?php

namespace Ms100\OpenWps\Responses;

use Ms100\OpenWps\Entities\User;

class UserInfoResponse extends Response
{
    /**
     * @var User[]
     */
    protected $users = [];

    /**
     * UserInfo constructor.
     *
     * @param User[] $users
     */
    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function addUser(User $user)
    {
        $this->users[] = $user;
    }

    public function jsonSerialize()
    {
        return ['users' => $this->users];
    }
}
