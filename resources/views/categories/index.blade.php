@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Category List</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>
    @if ($categories->isEmpty())
    <p>No categories found.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.view', $category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt" style="color: #ffffff;"></i></a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                            <i class="fas fa-trash" style="color: #ffffff;"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
