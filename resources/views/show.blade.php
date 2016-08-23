@extends('layouts.index')
@section('content')

<!-- <div class="container"> -->
<form action="{{ url('query') }}" method="GET">
    <div class="input-field col s12">
        <input type="text" class="validate" name="q">
        <label for="title">Cari</label>
    </div>
    <button type="submit" class="btn btn-success"><p class="text-rigth"><span class="glyphicon glyphicon-search"></span> Cari</p></button>
</form>

<div class="divider"></div>
<div class="container">
    <ul class="content-columns">
        @foreach($images as $img)
        <li>
            <article class="boxed">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset('images/'.$img->gambar)}}" class="img-responsive">
                        <span class="card-title">{{ $img->judul }}</span>
                    </div>
                    <div class="card-content">
                        <p>{!!substr($img->isi,0,20)!!}...</p>
                    </div>
                    <div class="card-action">
                        <button type="button" class="btn btn-success"><a href="{{ url('read', $img->id) }}"> <span class="glyphicon glyphicon-send"> </span></a></button>
                        <button type="button" class="btn btn-primary"><a href="{{ url('edit', $img->id) }}"> <span class="glyphicon glyphicon-edit"> </span></a></button>
                        <button type="button" class="btn btn-danger"><a href="{{ url('delete', $img->id) }}" onclick="return confirm('Are you sure?')"> <span class="glyphicon glyphicon-trash"> </span></a></button>
                    </div>
                </div>
            </article>
        </li>
        @endforeach
    </ul>
</div>
{{ $images->render() }}
<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a href="{{ url('add') }}" class="btn-floating btn-large red">
        <i class="glyphicon glyphicon-plus"></i>
    </a>
</div>
@endsection

