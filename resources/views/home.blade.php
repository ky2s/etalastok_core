@extends('layouts.app')

@section('content')
<section id="packages">
  <div class="container">
    <h2 class="text-center">Pilih Paket</h2>
    <div class="row">
      @foreach($packages as $package)
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <h3>{{ $package->name }}</h3>
            <p>{{ $package->description }}</p>
            <h4>Rp{{ number_format($package->price, 0, ',', '.') }}</h4>
            <a href="{{ route('package.checkout', $package->id) }}" class="btn btn-primary">Pilih Paket</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
