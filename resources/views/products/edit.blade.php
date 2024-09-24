@extends('layouts.admin')

@section('main-content')
<div class="container my-4">
    <h2>Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Product Description:</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Product Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="image">Product Image (Optional):</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image)
                <p>Current Image: <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('products.index', $companyid) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
