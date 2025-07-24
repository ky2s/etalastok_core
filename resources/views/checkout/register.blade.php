@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="mb-4">Checkout Register</h2>
        <form method="POST" action="{{ route('package.process') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Lanjut Pembayaran</button>
            <a href="{{ route('login') }}" class="btn btn-link">Already have an account?</a>
        </form>
    </div>
</div>
@endsection
