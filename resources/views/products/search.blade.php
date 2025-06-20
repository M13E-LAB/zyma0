@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Search for Product Prices</h1>
                    <form action="{{ route('products.fetch') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="product_code" class="form-label">Product Code</label>
                            <input type="text" class="form-control bg-dark text-light" id="product_code" name="product_code" required placeholder="e.g., 3017620422003 for Nutella">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection