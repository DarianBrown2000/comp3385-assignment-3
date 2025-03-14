<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
</head>
<body>

</body>
</html>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Client</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Phone</label>
                <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" id="telephone" value="{{ old('telephone') }}" placeholder="Format: 123-456-7890">
                @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" placeholder="1385 Antigua Ave, Five Islands Village, Antigua & Barbuda">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo</label>
                <input type="file" class="form-control @error('company_logo') is-invalid @enderror" name="company_logo" id="company_logo">
                <small class="form-text text-muted">Only image files (jpg, png, etc.) are allowed and must be less than 2MB.</small>
                @error('company_logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection