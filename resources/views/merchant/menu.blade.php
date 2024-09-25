@extends('layouts.app')

@section('title', 'Katering Putri - Menu Katering')

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
            <div class="col-md-12">
                <h1>Menu Katering</h1>

                <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th> <!-- Tambahkan kolom Nomor -->
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                        <!-- Tambahkan baris input untuk pencarian -->
                        <tr>
                            <th></th>
                            <th><input type="text" id="searchInput" class="form-control" placeholder="Cari Nama Menu..."></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody  id="menuTable">
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- Nomor Urut -->
                                <td>{{ $menu->nama_menu }}</td>
                                <td>{{ $menu->deskripsi }}</td>
                                <td>Rp. {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->nama_menu }}" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('menu.delete', $menu->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Tampilkan pagination links -->
                <div class="d-flex justify-content-center">
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let tableRows = document.querySelectorAll('#menuTable tr');

            tableRows.forEach(function(row) {
                let menuName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                if (menuName.indexOf(input) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
@endsection
