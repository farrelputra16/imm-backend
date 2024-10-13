@extends('layouts.admin')

@section('main-content')
    <div class="container mt-5">
        <h1 class="mb-4">Update Department</h1>
        <form action="{{ route('departments.update', $department->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT') <!-- This is important for updating resources -->
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name">Department Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $department->name) }}" placeholder="Enter department name" required>
                    <div class="invalid-feedback">
                        Please provide a department name.
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Department</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        // Bootstrap validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection