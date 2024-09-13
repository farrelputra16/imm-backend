@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Select a Company</h1>
    @if ($companies->isEmpty())
        <p>No companies found.</p>
    @else
        <div class="list-group">
            @foreach ($companies as $company)
                <a href="{{ route('company-income.index', ['company_id' => $company->id]) }}" class="list-group-item list-group-item-action">
                    {{ $company->nama }}
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
