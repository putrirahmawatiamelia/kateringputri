@extends('layouts.app')

@section('title', 'Katering Putri - Pengaturan Profil Admin')

@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Profil</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <p class="form-control-plaintext">{{ auth()->user()->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <p class="form-control-plaintext">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_terdaftar">Tanggal terdaftar</label>
                        <p class="form-control-plaintext">{{ auth()->user()->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
@endsection
