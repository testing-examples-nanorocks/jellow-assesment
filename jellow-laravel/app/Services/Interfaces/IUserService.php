<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface IUserService
{
    public function getUsers(int $limit = 5): Collection;

    public function getUserDetails(int $id): array;

    public function filerUsers(string $name, string $email): Collection;

    public function userAlbums(): Collection;

    public function userPosts(): Collection;

    public function userToDoes(): Collection;
}
