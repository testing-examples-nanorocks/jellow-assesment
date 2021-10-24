<?php

namespace App\Services;

class UserService implements IUserService
{
    public function getUsers(int $limit = 5): Collection
    {

    }

    public function getUserDetails(int $id): array
    {
        return [];
    }

    public function filerUsers(string $name, string $email): Collection
    {

    }

    public function userAlbums(): Collection
    {

    }

    public function userPosts(): Collection
    {

    }

    public function userToDoes(): Collection
    {

    }

}
