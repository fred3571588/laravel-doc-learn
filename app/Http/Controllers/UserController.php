<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = User::find(1);
        $user->posts()
            ->where(function (Builder $query) {
                return $query->where('active', 1)
                            ->orWhere('vote', '>=', 100);
            })
            ->get();



        $books = Book::with('author')->get();

        foreach ($books as $book){
            echo $book->author->name;
        }

        return view('welcome');
    }

    public function show(Request $request)
    {
        $value = $request->session()->get('key', 'default');
        dd($value);
    }
}
