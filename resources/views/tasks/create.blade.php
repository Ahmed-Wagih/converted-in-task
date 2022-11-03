@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .card {
            width: 600px;
        }
    </style>
@endpush
@section('content')
    <div class="card m-auto mt-5">
        <div class="card-header">
            Create New Task
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif
            <div class="m-auto" width="100px">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Admin</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                            name="assigned_by_id">
                            <option selected>Open this select menu</option>
                            @foreach ($admins as $admin)
                                <option {{ old('assigned_by_id') == $admin->id ? 'selected' : '' }}
                                    value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter Full Title" value="{{ old('name') }}" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
                    </div>
              
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Assigned User</label>
                        <select class="form-select form-select-sm rwst-class" aria-label=".form-select-sm example"
                            name="assigned_to_id">
                            <option selected>Open this select menu</option>
                            @foreach ($users as $user)
                                <option {{ old('assigned_to_id') == $user->id ? 'selected' : '' }}
                                    value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-warning">Cancel</button>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.form-select').select2();
        });
    </script>
@endpush
