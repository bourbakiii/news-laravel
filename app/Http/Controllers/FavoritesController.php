<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;


class FavoritesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id', $user->id)->with('post')->get();

        return view('favorites', ['favorites' => $favorites]);
    }
    public function add(Request $request, $postId)
    {
        $favorite = Favorite::create([
            'user_id' => Auth::id(),
            'post_id' => $postId,
        ]);

        return redirect()->back()->with('success', 'Post added to favorites.');
    }

    public function remove(Request $request, $postId)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('post_id', $postId)
            ->first();

        if ($favorite) {
            $favorite->delete();
        }

        return redirect()->back()->with('success', 'Post removed from favorites.');
    }
}