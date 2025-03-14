@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Create Client</a>
        </div>
        <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients, and much more.</p>

        <h2>Client List</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @if(count($clients) > 0)
                @foreach ($clients as $client)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                @if ($client->company_logo)
                                    <img src="{{ asset('storage/' . $client->company_logo) }}" alt="Company Logo" class="img-fluid mb-2" style="max-height: 100px;">
                                @else
                                    <div class="mb-2">No Logo</div>
                                @endif
                                <h5 class="card-title">{{ $client->name }}</h5>
                                <p class="card-text">{{ $client->email }}</p>
                                <p class="card-text">{{ $client->telephone }}</p>
                                <p class="card-text">{{ $client->address }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p>No clients found.</p>
                </div>
            @endif
        </div>
    </div>
@endsection