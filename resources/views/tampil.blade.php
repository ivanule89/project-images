@extends('layouts.index')
@section('content')
<div class="section">
	<form action="{{ url('query') }}" method="GET">
		<div class="input-field col s12">
			<input type="text" class="validate" name="q">
			<label for="title">Cari</label>
		</div>
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Cari</button>
	</form>

	<div class="row">
		<div class="col s12">
			<h5>{{ $tampilkan->judul }}</h5>
			<img src="{{ asset('images/'.$tampilkan->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;">
			<p></p>
			<div class="divider"></div>
			<p>{!! $tampilkan->isi !!}</p>

		</div>
	</div>
</div>
@endsection