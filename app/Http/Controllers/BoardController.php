<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    private $board;

    public function __construct(Board $board){
        $this->Board = $board;
    }

    public function index(){
        $boards = $this->Board->latest()->paginate(10);
        return view('board.index', compact('boards'));
    }

    public function create(){
        return view('board.create');
    }

    public function store(Request $request){
        $request = $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $user_id = auth()->id();
        $boardData = array_merge($request, ['user_id' => $user_id]);
        $this->Board->create($boardData);

        return redirect()->route('boards.index');
    }

    public function show(Board $board){
//        $user = auth()->user();
//        if ($user->can('view', $board)) {
//            $board->incrementViews();
//            return view('board.show', compact('board'));
//        } else {
//            throw new AuthorizationException('You are not authorized to view this post.');
//        }

        $board->incrementViews();
        return view('board.show', compact('board'));
    }

    public function update(Request $request, Board $board){
        $request = $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);
        $board->update($request);
        return redirect()->route('boards.index',$board);
    }

    public function delete(Board $board){
        $user = auth()->user();
        if ($user->can('delete', $board)) {
            $board->delete();
            return redirect()->route('boards.index', $board)->with('success', '게시물이 성공적으로 삭제되었습니다.');
        } else {
            abort(403, '게시물을 삭제할 권한이 없습니다.');
        }
    }
}
