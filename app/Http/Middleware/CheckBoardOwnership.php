<?php

namespace App\Http\Middleware;

use App\Models\Board;
use Illuminate\Http\Request;
use Closure;

class CheckBoardOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $boardId = $request->route('board');

        $board = Board::find($boardId);

        if ($board && $board->user_id === auth()->id()) {
            return response()->view('board.show', compact('board'));
        }

        abort(403, 'Unauthorized');

    }
}
