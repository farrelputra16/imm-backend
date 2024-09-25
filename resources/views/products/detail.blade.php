@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Product List</h1>
        <a href="{{ route('products.create', ['id' => $companyid]) }}">Create Product</a>
        @if ($products->isEmpty())
            <p>No products found.</p>
        @else
            <table id="products-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" height="100">
                            </td>
                            <td style="width: 200px;">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id, $companyid) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id, $companyid) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#products-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
