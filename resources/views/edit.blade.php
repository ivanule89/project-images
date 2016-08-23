@section('js')
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop

@extends('layouts.index')
@section('content')

<div class="section">
    <form action="{{ url('update', $tampiledit->id) }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" class="validate" name="judul" value="{{ $tampiledit->judul }}">
                <label for="title">Judul</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name="isi">{{ $tampiledit->isi }}</textarea>
                <label for="textarea1">Isi</label>
            </div>
        </div>

        <div class="row">
            <div class="col s6">
                <img src="{{ asset('images/'.$tampiledit->gambar) }}" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input type="file" id="inputgambar" name="gambar" class="validate"/ >
            </div>
        </div>

        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"> Submit</span></button>

    </form>
</div>

@endsection