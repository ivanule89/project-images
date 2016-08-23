@extends('layouts.index')
@section('content')

<div class="section">
    <div class="card-panel grey white-text">Image Galery</div>
</div>

<div class="section">
@if (count($hasil))
<div class="card-panel green white-text">Hasil pencarian : <b>{{$query}}</b></div>
    @foreach($hasil as $data)
    <div class="row">
		<div class="col s12">
			<h5>{{ $data->judul }}</h5>

            <div class="divider"></div>
            <img src="{{ asset('images/'.$data->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;">
            <p>{!!substr($data->isi,0,200)!!}...</p>
                
            <button type="button" class="btn btn-success"><a href="{{ url('read', $data->id) }}"><span class="glyphicon glyphicon-send"></span></a></button>
            <button type="button" class="btn btn-warning"><a href="{{ url('edit', $data->id) }}"><span class="glyphicon glyphicon-edit"></span></a></button>
            <button type="button" class="btn btn-danger"><a href="{{ url('delete', $data->id) }}" onclick="return confirm('Are you sure?')"><span class="glyphicon glyphicon-trash"></span></a></button>
		</div>
	</div>
	@endforeach

</div>

{{ $hasil->render() }}
	
@else
   <div class="card-panel red darken-3 white-text"> Data <b>{{$query}}</b> Tidak Ditemukan</div>
@endif
	



@endsection