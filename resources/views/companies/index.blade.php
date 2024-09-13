@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Company List</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Create New Company</a>
        @if ($companies->isEmpty())
            <p>No company found.</p>
        @else
            <table id="companies-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Profile</th>
                        <th>Tipe</th>
                        <th>Nama PIC</th>
                        <th>Posisi PIC</th>
                        <th>Telepon</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Jumlah Karyawan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        @php
                            if (!function_exists('shorten_text')) {
                                function shorten_text($text, $max_length)
                                {
                                    if (strlen($text) > $max_length) {
                                        return substr($text, 0, $max_length) . '...';
                                    } else {
                                        return $text;
                                    }
                                }
                            }
                            $shortened_text = shorten_text($company->profile, 20);
                        @endphp
                        <tr>
                            <td>{{ $company->nama }}</td>
                            <td>{{ $shortened_text }}</td>
                            <td>{{ $company->tipe }}</td>
                            <td>{{ $company->nama_pic }}</td>
                            <td>{{ $company->posisi_pic }}</td>
                            <td>{{ $company->telepon }}</td>
                            <td>{{ $company->negara }}</td>
                            <td>{{ $company->provinsi }}</td>
                            <td>{{ $company->kabupaten }}</td>
                            <td>{{ $company->jumlah_karyawan }}</td>
                            <td style="width:100%;">
                                <a href="{{ route('companies.view', $company->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-pencil-alt" style="color: #ffffff;"></i></a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this company?')">
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

    <script>
        $(document).ready(function() {
            $('#companies-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
