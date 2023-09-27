<?php

namespace App\Http\Controllers;

use App\Models\Speech;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get the user's search query from the request
        $searchQuery = $request->input('q');

        // Use Eloquent to retrieve the records from the speeches table based on the search query
        $speeches = Speech::where('speech_content', 'like', '%' . $searchQuery . '%')
            ->paginate(5);

        // Return the speeches as a response with the query
        return view('results', compact('speeches'))->with('query', $searchQuery);
    }
}
