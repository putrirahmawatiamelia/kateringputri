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
                <h1>Ubah Menu Katering</h1>

                <form action="{{ route('menu.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Tambahkan ini untuk menggunakan PUT method -->

                    <div class="form-group">
                        <label for="name">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" value="{{ $product->nama_menu }}" name="nama_menu" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" id="harga" value="{{ $product->harga }}" name="harga" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        <!-- Tampilkan gambar yang sudah diupload sebelumnya -->
                        @if($product->image)
                        <div class="mt-3">
                            <p>Gambar Saat Ini:</p>
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Gambar Menu Katering" style="width: 150px; height: auto;" id="existing-image">
                        </div>
                        @endif

                        <!-- Preview gambar yang baru dipilih -->
                        <div class="mt-3">
                            <p>Preview Gambar Baru:</p>
                            <img id="image-preview" src="#" alt="Preview Gambar" style="display: none; width: 150px; height: auto;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah Menu</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Preview gambar yang baru dipilih
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            const allowedTypes = ['image/jpeg', 'image/png'];

            if (!allowedTypes.includes(file.type)) {
                alert('Hanya file JPG, JPEG, atau PNG yang diperbolehkan.');
                this.value = ''; // Hapus file yang dipilih jika tidak valid
                imagePreview.style.display = 'none'; // Sembunyikan preview
            } else {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; // Tampilkan preview
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
@endsection
