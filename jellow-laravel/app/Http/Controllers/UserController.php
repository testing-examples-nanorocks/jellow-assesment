<?php

namespace App\Http\Controllers;

use App\Models\FavoriteAlbum;
use App\Models\Todo;
use App\Models\User;
use App\Services\AlbumsService;
use App\Services\FavoriteAlbumsService;
use App\Services\PostsService;
use App\Services\ToDoesService;
use App\Services\UsersService;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public UsersService $usersService;

    public FavoriteAlbumsService $favoriteAlbumService;

    public AlbumsService $albumsService;

    public PostsService $postsService;

    public ToDoesService $toDoesService;

    public function __construct(
        UsersService          $userService,
        FavoriteAlbumsService $favoriteAlbumService,
        AlbumsService         $albumsService,
        PostsService          $postsService,
        ToDoesService         $toDoesService
    )
    {
        $this->usersService = $userService;
        $this->favoriteAlbumService = $favoriteAlbumService;
        $this->albumsService = $albumsService;
        $this->postsService = $postsService;
        $this->toDoesService = $toDoesService;
    }

    /**
     * @return Collection
     */
    public function filterUsers(): Collection
    {
        return $this->usersService->filterUsers();
    }

    /**
     * @param int $userId
     * @param int $albumId
     * @return FavoriteAlbum
     */
    public function addFavoriteAlbum(int $userId, int $albumId): FavoriteAlbum
    {
        return $this->favoriteAlbumService->addFavoriteAlbum($userId, $albumId);
    }

    /**
     * @param int $userId
     * @param int $albumId
     * @return bool
     */
    public function removeFavoriteAlbum(int $userId, int $albumId): bool
    {
        return $this->favoriteAlbumService->removeFavoriteAlbum($userId, $albumId);
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function showFavoriteAlbums(int $userId): Collection
    {
        return $this->favoriteAlbumService->showFavoriteAlbums($userId);
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function filterAlbums(int $userId): Collection
    {
        return $this->albumsService->filterAlbums($userId);
    }

    /**
     * @param int $userId
     * @param int $limit
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function chunkPosts(int $userId, int $limit): \Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->postsService->chunkPosts($userId, $limit);
    }

    /**
     * @param int $userId
     * @return User
     */
    public function details(int $userId): User
    {
        return $this->usersService->details($userId);
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function toDoes(int $userId): Collection
    {
        return $this->usersService->toDoes($userId);
    }

    /**
     * @param int $userId
     * @param int $todoId
     * @return Todo
     */
    public function toDoComplete(int $userId, int $todoId): Todo
    {
        return $this->toDoesService->toDoComplete($userId, $todoId);
    }
}
