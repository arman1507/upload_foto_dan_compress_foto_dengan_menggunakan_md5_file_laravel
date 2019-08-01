@extends('master')
@section('isihal')
@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br />
    @endforeach
</div>
@endif

<form action="/notelepon/input" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h2>Nomor Telepon</h2>
    <label for="notelpon">Nomor Telepon : </label> 
    <input id="notelpon" name="idnegara" required="required" type="text" maxlength="2" class="inputs" style="width: 20px" value="{{ $n }}">
    - <input id="notelpon" name="area1" required="required" type="text" maxlength="3" class="width-coloumn m_focus">
    - <input id="notelpon" name="area2" required="required" type="text" maxlength="4" class="width-coloumn m_focus">
    - <input id="notelpon" name="area3" required="required" type="text" maxlength="6" class="width-coloumn m_focus">
    <br />
    <input type="submit" value="Simpan Nomor" class="btn btn-primary">
</form>

@endsection

@section('skrip')
<script type="text/javascript">
    $(".m_focus").keyup(function () {
        if (this.value.length == this.maxLength) {
          $(this).next('.m_focus').focus();
        }
    });
</script>
@endsection
