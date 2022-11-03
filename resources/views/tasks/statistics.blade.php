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
                        <th scope="col">Name</th>
                        <th scope="col">Task Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->tasks_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
