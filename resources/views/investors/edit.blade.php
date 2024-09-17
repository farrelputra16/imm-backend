@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Investor</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('investors.update', $investor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="org_name">Organization Name:</label>
                    <input type="text" class="form-control" id="org_name" name="org_name" value="{{ $investor->org_name }}" required>

                    <label for="number_of_contacts">Number of Contacts:</label>
                    <input type="number" class="form-control" id="number_of_contacts" name="number_of_contacts" value="{{ $investor->number_of_contacts }}" required>

                    <label for="number_of_investments">Number of Investments:</label>
                    <input type="number" class="form-control" id="number_of_investments" name="number_of_investments" value="{{ $investor->number_of_investments }}" required>

                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $investor->location }}" required>

                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $investor->description }}</textarea>

                    <label for="departments">Departments:</label>
                    <input type="text" class="form-control" id="departments" name="departments" value="{{ $investor->departments }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Investor</button>
            </form>
        </div>
    </div>
</div>
@endsection
