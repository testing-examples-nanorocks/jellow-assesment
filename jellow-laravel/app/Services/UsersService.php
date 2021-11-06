<?php

namespace App\Services;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\QueryBuilder;

class UsersService
{

    /**
     * Handle all users + filter by username and email
     * ex. ?filter[name]=Samantha
     * ex. ?filter[email]=name@email.com
     *
     * @return Collection
     */
    public function filterUsers(): Collection
    {
        return User::allowedFilters([User::NAME, User::EMAIL])->get();
    }

    /**
     * @param int $userId
     * @return User
     */
    public function details(int $userId): User
    {
        return User::findOrFail($userId);
    }

    /**
     * Handle user todoes + filter by title and completed
     * ex. ?filter[completed]=0
     * ex. ?filter[title]=vero rerum temporibus dolor
     *
     * @param int $userId
     * @return Collection
     */
    public function toDoes(int $userId): Collection
    {
        return User::toDoes([Todo::COMPLETED, Todo::TITLE], $userId)->get();
    }
}
