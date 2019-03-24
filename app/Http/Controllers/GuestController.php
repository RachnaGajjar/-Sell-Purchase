<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchBook;
use App\User;
use App\Book;

class GuestController extends Controller
{
    //
    public function search(Request $request) {
    	$q = $request->get('query');
    	$part = '%' . $q . '%';
    	$list = SearchBook::where('title', 'like', $part)->get();
    	return view('guest.book-search', compact('q', 'list'));
    }

    public function details(Request $request, Book $book) {
    	return view('guest.book-details', compact('book'));
    }

    public function user(Request $request, User $user) {
    	$genders = ['MALE' => "Male", 'FEMALE' => "Female", 'OTHER' => "Other"];
    	return view('guest.user-details', compact('user', 'genders'));
    }
}
