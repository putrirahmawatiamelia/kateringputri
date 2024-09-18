@extends('layouts.app')

@section('title', 'Katering Putri - Dashboard')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Dashboard</h1>
    @if (Auth::check() && Auth::user()->role == 'admin')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Users -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-700">Total Users</h2>
            <p class="mt-4 text-3xl font-semibold text-gray-900">{{ $totalUsers }}</p>
        </div>

        <!-- Total Merchants -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-700">Merchants</h2>
            <p class="mt-4 text-3xl font-semibold text-gray-900">{{ $totalMerchants }}</p>
        </div>

        <!-- Total Customers -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-700">Customers</h2>
            <p class="mt-4 text-3xl font-semibold text-gray-900">{{ $totalCustomers }}</p>
        </div>
    </div>
    @endif
    @if (Auth::check() && Auth::user()->role == 'merchant')
        <h5 class="font-bold text-gray-200 ml-3">INI BAGIAN MERCHANT</h5>
    @endif
</div>
@endsection
