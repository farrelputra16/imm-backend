@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Company Outcomes</h1>
        @if ($outcomes->isEmpty())
            <p>No company outcomes found.</p>
        @else
            <table id="outcomes-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Hibah Nominal</th>
                        <th>Detail Penggunaan Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outcomes as $outcome)
                        <tr>
                            <td>{{ $outcome->project->nama }}</td>
                            <td>{{ $outcome->project->dana ? $outcome->project->dana->where('jenis_dana', 'Hibah')->first()->nominal : '-' }}
                            </td>
                            <td>
                                <a href="{{ route('company-outcome.detail-outcome', ['project_id' => $outcome->project_id]) }}"
                                    class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Cek disini
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#outcomes-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
