<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Image;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = Image::where('judul', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('search', compact('hasil', 'query'));
    }
}