<?php

namespace App\Services;

use App\Models\Album;
use Illuminate\Support\Collection;


class AlbumsService
{
    /**
     * @param int $userId
     * @return Collection
     */
    public function filterAlbums(int $userId): Collection
    {
        return Album::allowedFilters([Album::TILE])
            ->where(Album::USER_ID, $userId)
            ->with('photo')
            ->get();
    }
}
