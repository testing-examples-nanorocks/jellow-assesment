<?php

namespace App\Services;

use App\Models\FavoriteAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FavoriteAlbumsService
{
    /**
     * @param int $userId
     * @param int $albumId
     * @return FavoriteAlbum
     */
    public function addFavoriteAlbum(int $userId, int $albumId): FavoriteAlbum
    {
        return FavoriteAlbum::firstOrCreate([
            FavoriteAlbum::USER_ID => $userId,
            FavoriteAlbum::ALBUM_ID => $albumId
        ]);
    }

    /**
     * @param int $userId
     * @param int $albumId
     * @return bool
     */
    public function removeFavoriteAlbum(int $userId, int $albumId): bool
    {
        return FavoriteAlbum::where(FavoriteAlbum::USER_ID, $userId)
            ->where(FavoriteAlbum::ALBUM_ID, $albumId)
            ->delete();
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function showFavoriteAlbums(int $userId): Collection
    {
        return FavoriteAlbum::where(FavoriteAlbum::USER_ID, $userId)
            ->with('album')
            ->get();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function underThreeFavorites(Request $request): bool
    {
        return FavoriteAlbum::where(FavoriteAlbum::USER_ID, $request->userId)->count() < 3;
    }
}
