@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Indicator</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $indicator->name }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="order">{{ __('Order') }}:</label>
                <input type="text" class="form-control" id="order" name="order" value="{{ $indicator->order }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="level">{{ __('Level') }}:</label>
                <input type="text" class="form-control" id="level" name="level" value="{{ $indicator->level }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="parent_indicator">{{ __('Parent Indicator') }}:</label>
                <input type="text" class="form-control" id="parent_indicator" name="parent_indicator" value="{{ $indicator->parentIndicator ? $indicator->parentIndicator->name : 'None' }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="sdg">{{ __('SDG') }}:</label>
                <input type="text" class="form-control" id="sdg" name="sdg" value="{{ $indicator->sdg ? $indicator->sdg->name : 'None' }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="description">{{ __('Description') }}:</label>
                <textarea class="form-control" id="description" name="description" readonly>{{ $indicator->description }}</textarea>
            </div>

            <a href="{{ route('indicators.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
