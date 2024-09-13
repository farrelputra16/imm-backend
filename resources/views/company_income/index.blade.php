@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Company Income</h1>
    @if ($selectedCompany)
        <a href="{{ route('company-income.create', ['company_id' => $selectedCompany->id]) }}" class="btn btn-primary mb-3">Add New Income</a>
    @endif

    @if ($companyIncomes)
        @if ($companyIncomes->isEmpty())
            <p>No income found.</p>
        @else
            <!-- Display company income data -->
            <table id="incomes-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Pengirim</th>
                        <th>Bank Asal</th>
                        <th>Bank Tujuan</th>
                        <th>Jumlah Hibah</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companyIncomes as $income)
                        <tr>
                            <td>{{ $income->date }}</td>
                            <td>{{ $income->pengirim }}</td>
                            <td>{{ $income->bank_asal }}</td>
                            <td>{{ $income->bank_tujuan }}</td>
                            <td>{{ $income->jumlah_hibah }}</td>
                            <td>
                                {{-- View button --}}
                                <a href="{{ route('company-income.show', $income->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>

                                {{-- Edit button --}}
                                <a href="{{ route('company-income.edit', $income->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                {{-- Delete form --}}
                                <form action="{{ route('company-income.destroy', $income->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this income?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @else
        <p>No income data available.</p>
    @endif
</div>

<script>
$(document).ready(function() {
    $('#incomes-table').DataTable({
        responsive: true
    });
});
</script>
@endsection
