<?php

namespace App\Http\Controllers;

Use App\Image;

Use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;



class ImagesController extends Controller
{
   // public function __construct() {
   //      $this->middleware('auth');
   //  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('id','DESC')->paginate(12);
        return view('show')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('images.create');
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'judul' => 'required',
          'isi' => 'required',
          // 'gambar' => 'required|image|mimes:jpg,jpeg,JPEG,bmp,png','max:200',
          ]);
        $tambah = new Image();
        $tambah->judul = $request['judul'];
        $tambah->isi = $request['isi'];
        $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        $request->file('gambar')->move("images/", $fileName);

        $tambah->gambar = $fileName;
        $tambah->save();

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampilkan = Image::find($id);
        return view('tampil')->with('tampilkan', $tampilkan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tampiledit = Image::where('id', $id)->first();
        // dd($tampiledit->first());
        return view('edit')->with('tampiledit', $tampiledit);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Image::where('id', $id)->first();
        $update->judul = $request['judul'];
        $update->isi = $request['isi'];

        if($request->file('gambar') == "")
        {
            $update->gambar = $update->gambar;
        } 
        else
        {
            $file       = $request->file('gambar');
            $fileName   = $file->getClientOriginalName();
            $request->file('gambar')->move("images/", $fileName);
            $update->gambar = $fileName;
        }
        $update->update();
        return redirect()->to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $hapus = Image::find($id);
        
        File::delete("images/", $hapus->gambar);
        $hapus->delete();

        return redirect()->to('/');
    }
}
