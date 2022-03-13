@extends('admin.master')

@section('title', 'Departments | ' . env('APP_NAME'))

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">All Departments</h1>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-outline-primary px-5">Add New</a>
    </div>

    <table class="table table-hover table-striped table-bordered">
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        @forelse ($departments as $dep)
            <tr>
                <td>{{ $dep->id }}</td>
                <td>{{ $dep->name_en }}</td>
                <td>{{ $dep->name_ar }}</td>
                <td>12 Dec, 2022</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center">No Data Found</td>
            </tr>
        @endforelse
    </table>

    {{ $departments->links() }}

@stop
