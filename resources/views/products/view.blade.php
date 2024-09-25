@extends('layouts.admin')

@section('main-content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="display-4 text-center mb-5">Companies Overview</h1>
        </div>
    </div>

    {{-- Perusahaan yang memiliki produk --}}
    <div class="row mb-5">
        <div class="col-lg-12">
            <h4 class="mb-4 text-success">Companies with Products</h4>
            
            @if ($companiesWithProducts->isEmpty())
                <p class="text-muted">No companies with products found.</p>
            @else
                <div class="list-group">
                    @foreach ($companiesWithProducts as $company)
                        <div class="list-group-item shadow-sm mb-4 p-4 border-0 rounded">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="font-weight-bold text-primary mb-2">{{ $company->nama }}</h5>
                                    <p class="text-secondary mb-3">{{ $company->startup_summary }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('products.index', ['id' => $company->id]) }}" class="btn btn-outline-primary btn-sm">
                                        View Products
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    {{-- Perusahaan yang tidak memiliki produk --}}
    <div class="row">
        <div class="col-lg-12">
            <h4 class="mb-4 text-danger">Companies without Products</h4>
            
            @if ($companiesWithoutProducts->isEmpty())
                <p class="text-muted">All companies have products.</p>
            @else
                <div class="list-group">
                    @foreach ($companiesWithoutProducts as $company)
                        <div class="list-group-item shadow-sm mb-4 p-4 border-0 rounded">
                            <h5 class="font-weight-bold text-dark mb-2">{{ $company->nama }}</h5>
                            <p class="text-secondary mb-0">{{ $company->startup_summary }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
