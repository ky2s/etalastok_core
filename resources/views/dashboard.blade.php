@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-0">Dashboard</h2>
            <p class="text-muted">Selamat datang, {{ Auth::user()->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4 class="mb-3">Produk Anda</h4>

            @if ($services->isEmpty())
                <div class="alert alert-info">Belum ada produk tersedia.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Service</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $s)
                            <tr>
                                <td>{{ $s->service_name }}</td>
                                <td>Rp {{ number_format($s->price_per_kg, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
