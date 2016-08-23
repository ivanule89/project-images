<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
    'id', 'judul', 'isi',
    ];
    public static function valid($id='')
    {
        return array (
            'id' => 'required|min:10|unique:images,id'.($id ? ",$id" : ''),
            'judul' => 'required|min:100|unique:images,judul'.($id ? ",$id" : ''),
            'gambar' => 'required|image|mimes:jpg,jpeg,JPEG,bmp,png','max:200',
            );
    }

	//modul model 3.1 table manipulation
    // protected $table ='images';
    // protected $primaryKey = 'id';
    // protected $fillable = ['judul','isi'];
    // public $timestamps = false;
}
