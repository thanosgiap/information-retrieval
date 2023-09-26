<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function displaySearchResults(Request $request)
    {
        $query = $request->input('query'); // Retrieve the search query from the request

        // Perform the search (replace this with your actual search logic)
        //$articles = Article::where('title', 'like', '%' . $query . '%')->paginate(5);
        $articles=[['title'=>'aa','content'=>'asdsad'],['title'=>'aa','content'=>'asdsad'],['title'=>'aa','content'=>'asdsad'],['title'=>'aa','content'=>'asdsad'],['title'=>'aa','content'=>'asdsad'],['title'=>'aa','content'=>'asdsad']];
        return view('search-results', compact('articles', 'query'));
    }
}