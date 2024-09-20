@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Add New Company Income for {{ $company->nama }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('company-income.store') }}" method="POST">
        @csrf
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
        </div>
        <div class="form-group">
            <label for="pengirim">Sender</label>
            <input type="text" name="pengirim" id="pengirim" class="form-control" value="{{ old('pengirim') }}" required>
        </div>
        <div class="form-group">
            <label for="bank_asal">Source Bank</label>
            <input type="text" name="bank_asal" id="bank_asal" class="form-control" value="{{ old('bank_asal') }}" required>
        </div>
        <div class="form-group">
            <label for="bank_tujuan">Destination Bank</label>
            <input type="text" name="bank_tujuan" id="bank_tujuan" class="form-control" value="{{ old('bank_tujuan') }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Grant Amount</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
        </div>
        <div class="form-group">
            <label for="funding_type">Funding Type</label>
            <select name="funding_type" id="funding_type" class="form-control" required>
                <option value="pre_seed" {{ old('funding_type') === 'pre_seed' ? 'selected' : '' }}>pre_seed Funding</option>
                <option value="seed" {{ old('funding_type') === 'seed' ? 'selected' : '' }}>Seed Funding</option>
                <option value="series_a" {{ old('funding_type') === 'series_a' ? 'selected' : '' }}>Series A Funding</option>
                <option value="series_b" {{ old('funding_type') === 'series_b' ? 'selected' : '' }}>Series B Funding</option>
                <option value="series_c" {{ old('funding_type') === 'series_c' ? 'selected' : '' }}>Series C Funding</option>
                <option value="series_d" {{ old('funding_type') === 'series_d' ? 'selected' : '' }}>Series D Funding</option>
                <option value="series_e" {{ old('funding_type') === 'series_e' ? 'selected' : '' }}>Series E Funding</option>
                <option value="debt" {{ old('funding_type') === 'debt' ? 'selected' : '' }}>Debt Funding</option>
                <option value="equity" {{ old('funding_type') === 'equity' ? 'selected' : '' }}>Equity Funding</option>
                <option value="convertible_debt" {{ old('funding_type') === 'convertible_debt' ? 'selected' : '' }}>Convertible Debt</option>
                <option value="grants" {{ old('funding_type') === 'grants' ? 'selected' : '' }}>Grants</option>
                <option value="revenue_based" {{ old('funding_type') === 'revenue_based' ? 'selected' : '' }}>Revenue-Based Financing</option>
                <option value="private_equity" {{ old('funding_type') === 'private_equity' ? 'selected' : '' }}>Private Equity</option>
                <option value="ipo" {{ old('funding_type') === 'ipo' ? 'selected' : '' }}>Initial Public Offering (IPO)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipe_investasi">Investment Type</label>
            <select name="tipe_investasi" id="tipe_investasi" class="form-control">
                <option value="" {{ old('tipe_investasi') === '' ? 'selected' : '' }}>Tidak ada</option>
                <option value="venture_capital" {{ old('tipe_investasi') === 'venture_capital' ? 'selected' : '' }}>Venture Capital</option>
                <option value="angel_investment" {{ old('tipe_investasi') === 'angel_investment' ? 'selected' : '' }}>Angel Investment</option>
                <option value="crowdfunding" {{ old('tipe_investasi') === 'crowdfunding' ? 'selected' : '' }}>Crowdfunding</option>
                <option value="government_grant" {{ old('tipe_investasi') === 'government_grant' ? 'selected' : '' }}>Government Grant</option>
                <option value="foundation_grant" {{ old('tipe_investasi') === 'foundation_grant' ? 'selected' : '' }}>Foundation Grant</option>
                <option value="buyout" {{ old('tipe_investasi') === 'buyout' ? 'selected' : '' }}>Buyout</option>
                <option value="growth_capital" {{ old('tipe_investasi') === 'growth_capital' ? 'selected' : '' }}>Growth Capital</option>
            </select>
        </div>             
        <button type="submit" class="btn btn-primary">Add Income</button>
    </form>
</div>
@endsection
