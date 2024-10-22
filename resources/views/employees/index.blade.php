<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 text-center">
            <a href="{{ url('/home') }}" ><H1>Go to Home</H1></a>
        </div>
        <h1>Employees</h1>
        
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Profile Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td><img src="{{ asset('private/' . $employee->profile_picture) }}" alt="Profile" width="50"></td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $employees->links() }}
    </div>
@endsection
