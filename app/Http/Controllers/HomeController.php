<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Speech;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get the user's search query from the request
        $searchQuery = $request->input('q');
        $searchIn = $request->input('search_in', 'speeches');
        $members = null;
        $speeches = null;
        $party_members = null;

        if ($searchIn === 'speeches') {
            $speeches = Speech::where('speech_content', 'like', '%' . $searchQuery . '%')
                ->paginate(5);
        } elseif ($searchIn === 'names') {
            $members = Member::where('name', 'like', '%' . $searchQuery . '%')
                ->paginate(5);
        } elseif ($searchIn === 'party') {
            $party_members = Member::where('political_party', 'like', '%' . $searchQuery . '%')->paginate(5);
        }


        if ($searchIn === 'speeches' && $speeches) {
            $speeches->appends(['search_in' => $searchIn, 'q' => $searchQuery]);
        } elseif ($searchIn === 'names' && $members) {
            $members->appends(['search_in' => $searchIn, 'q' => $searchQuery]);
        } elseif ($searchIn === 'party' && $party_members) {
            $party_members->appends(['search_in' => $searchIn, 'q' => $searchQuery]);
        }

        // Return the speeches as a response with the query
        return view('welcome', compact('speeches', 'members', 'party_members', 'searchIn'))->with('query', $searchQuery);
    }

    public function search(Request $request)
    {
        // Get the user's search query from the request
        $searchQuery = $request->input('q');
        $searchIn = $request->input('search_in', 'speeches');
        $members = null;
        $speeches = null;
        $party_members = null;

        if ($searchIn === 'speeches') {
            $speeches = Speech::where('speech_content', 'like', '%' . $searchQuery . '%')
                ->paginate(5);
        } elseif ($searchIn === 'names') {
            $members = Member::where('name', 'like', '%' . $searchQuery . '%')
                ->paginate(5);
        } elseif ($searchIn === 'party') {
            $party_members = Member::where('political_party', 'like', '%' . $searchQuery . '%')->get();

            $membersByParty = [];

            foreach ($party_members as $member) {
                $party = $member->political_party;

                if (!isset($membersByParty[$party])) {
                    $membersByParty[$party] = [];
                }

                $membersByParty[$party][] = $member;
            }
        }


        if ($searchIn === 'speeches' && $speeches) {
            $speeches->appends(['search_in' => $searchIn, 'q' => $searchQuery]);
        } elseif ($searchIn === 'names' && $members) {
            $members->appends(['search_in' => $searchIn, 'q' => $searchQuery]);
        }

        // Return the speeches as a response with the query
        return view('results', compact('speeches', 'members', 'membersByParty', 'searchIn'))->with('query', $searchQuery);
    }
}
