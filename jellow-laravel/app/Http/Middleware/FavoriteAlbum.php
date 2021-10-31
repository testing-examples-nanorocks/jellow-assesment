<?php

namespace App\Http\Middleware;

use App\Exceptions\UnderThreeFavoritesException;
use App\Services\FavoriteAlbumsService;
use Closure;
use Illuminate\Http\Request;

class FavoriteAlbum
{
    public FavoriteAlbumsService $favoriteAlbumsService;

    public function __construct(FavoriteAlbumsService $favoriteAlbumsService)
    {
        $this->favoriteAlbumsService = $favoriteAlbumsService;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws UnderThreeFavoritesException
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$this->favoriteAlbumsService->underThreeFavorites($request))
        {
            throw new UnderThreeFavoritesException('Only three favorite albums allowed!!!');
        }

        return $next($request);
    }
}
