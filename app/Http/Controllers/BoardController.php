<?php

namespace App\Http\Controllers;

use App\Models\Board;
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
}
