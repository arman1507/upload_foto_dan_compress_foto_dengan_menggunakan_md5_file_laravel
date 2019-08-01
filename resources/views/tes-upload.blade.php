@extends('master')
@section('isihal')
@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
				@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<form action="/c-u/upload" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <b>File Gambar</b><br/>
        <input type="file" name="f-u">
    </div>
    <input type="submit" value="Upload gambar" class="btn btn-primary">
</form>



@endsection