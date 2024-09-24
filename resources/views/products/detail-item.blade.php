@extends('layouts.admin')

@section('main-content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-6">
            <!-- Gambar Produk -->
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <!-- Detail Produk -->
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">{{ $product->description }}</p>
            <h4 class="text-primary">Rp {{ number_format($product->price, 2, ',', '.') }}</h4>
            
            <!-- Tanggal Pembuatan -->
            <p class="text-secondary"><small>Created on: {{ $product->created_at->format('d M Y, H:i') }}</small></p>

            <!-- Tombol Kembali -->
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
