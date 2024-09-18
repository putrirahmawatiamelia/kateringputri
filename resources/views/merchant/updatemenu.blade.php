@extends('layouts.app')

@section('title', 'Katering Putri - Tambah Menu Katering')

@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Tambah Menu Katering</h1>

                <form action="{{ route('menu.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" value="{{ $menus->nama_menu }}" name="nama_menu" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="deskripsi" rows="3" required>{{ $menus->deskripsi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" id="harga" value="{{ $menus->harga }}" name="harga" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control-file" id="image" name="image" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const imageInput = document.getElementById('image');

        imageInput.addEventListener('change', function() {
          const file = this.files[0];
          const allowedTypes = ['image/jpeg', 'image/png'];

          if (!allowedTypes.includes(file.type)) {
            alert('Hanya file JPG, JPEG, atau PNG yang diperbolehkan.');
            this.value = ''; // Menghapus file yang dipilih jika tidak valid
          }
        });
    </script>
</body>
</html>
@endsection
