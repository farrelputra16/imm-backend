@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Indicator</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('indicators.update', $indicator->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{ __('Name') }}:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $indicator->name }}" required>
                </div>
                <div class="form-group">
                    <label for="order">{{ __('Order') }}:</label>
                    <input type="text" class="form-control" id="order" name="order" value="{{ $indicator->order }}" required>
                </div>
                <div class="form-group">
                    <label for="level">{{ __('Level') }}:</label>
                    <select class="form-control" id="level" name="level" required>
                        <option value="1" {{ $indicator->level == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $indicator->level == 2 ? 'selected' : '' }}>2</option>
                    </select>
                </div>
                <div class="form-group" id="parentIndicatorGroup">
                    <label for="parent_indicator_id">{{ __('Parent Indicator') }}:</label>
                    <select class="form-control" id="parent_indicator_id" name="parent_indicator_id">
                        <option value="">{{ __('None') }}</option>
                        @foreach($indicators as $parentIndicator)
                            @if (!$parentIndicator->parent_indicator_id)
                                <option value="{{ $parentIndicator->id }}" {{ $indicator->parent_indicator_id == $parentIndicator->id ? 'selected' : '' }}>
                                    {{ $parentIndicator->order }}. {{ $parentIndicator->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label for="sdg_id">{{ __('SDG') }}:</label>
                    <select class="form-control" id="sdg_id" name="sdg_id" required>
                        @foreach($sdgs as $sdg)
                            <option value="{{ $sdg->order }}" {{ $indicator->sdg_id == $sdg->id ? 'selected' : '' }}>
                                {{ $sdg->order }}. {{ $sdg->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Description') }}:</label>
                    <textarea class="form-control" id="description" name="description">{{ $indicator->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Update Indicator') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
