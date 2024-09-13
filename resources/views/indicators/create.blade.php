@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Create New Indicator') }}</h1>

<!-- Display success message if any -->
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Display validation errors if any -->
@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Form for creating a new indicator -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('indicators.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="order">{{ __('Order') }}:</label>
                    <input type="text" class="form-control" id="order" name="order" required>
                </div>
                <div class="form-group">
                    <label for="level">{{ __('Level') }}:</label>
                    <select class="form-control" id="level" name="level" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group" id="parentIndicatorGroup">
                    <label for="parent_indicator_id">{{ __('Parent Indicator') }}:</label>
                    <select class="form-control" id="parent_indicator_id" name="parent_indicator_id">
                        <option value="">{{ __('None') }}</option>
                        @foreach($indicators as $parentIndicator)
                            @if (!$parentIndicator->parent_indicator_id)
                                <option value="{{ $parentIndicator->id }}">{{ $parentIndicator->order }}. {{ $parentIndicator->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sdg_id">{{ __('SDG') }}:</label>
                    <select class="form-control" id="sdg_id" name="sdg_id" required>
                        @foreach($sdgs as $sdg)
                            <option value="{{ $sdg->order }}">{{ $sdg->order }}. {{ $sdg->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Description') }}:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create Indicator') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
