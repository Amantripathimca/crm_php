
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <a href="{{ url('/home') }}" ><H1>Go to Home</H1></a>
        </div>
        <h1>Companies</h1>
      
        <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50"></td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
@endsection
