@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Edit mahasiswa</h1>
            <hr>
            @foreach($data as $datas)
            <form action="{{ route('mahasiswa.update', $datas->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="usr" name="nama" value="{{ $datas->nama }}">
                </div>
                <div class="form-group">
                    <label for="kelas">alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $datas->alamat }}">
                </div>
                <div class="form-group">
                    <label for="no_hp">File:</label>
                    <input type="file" class="form-control" id="file" name="file" value="{{ $datas->file }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
            @endforeach
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection