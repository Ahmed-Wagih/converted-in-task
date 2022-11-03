@extends('layouts.app')
@push('styles')
    <style>
        .card {
            width: 1200px;
        }
    </style>
@endpush
@section('content')
    <div class="card m-auto mt-5">
        <div class="card-header">
            Tasks
        </div>
        <div class="card-body">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Assigned Name</th>
                        <th scope="col">Admin Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->user ? $task->user->name : '' }}</td>
                            <td>{{ $task->admin ? $task->admin->name : '' }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {!! $tasks->links() !!}
        </div>
    </div>
@endsection
