<div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Upload File</h1>
            <hr>
            <form enctype="multipart/form-data" action="{{ route('mahasiswa.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="usr" name="nama">
                </div>
                <div class="form-group">
                    <label for="nama">alamat:</label>
                    <input type="text" class="form-control" id="usr" name="alamat">
                </div>
                <div class="form-group">
                    <label for="email">File:</label>
                    <input type="file" class="form-control" id="email" name="file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
        </div>