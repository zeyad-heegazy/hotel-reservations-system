@extends('layout')

@section('content')
    <h2>Activity Logs</h2>

    <div class="card mt-4">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Action</th>
                    <th>Model</th>
                    <th>Model ID</th>
                    <th>Date</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->action }}</td>
                        <td>{{ $log->entity_type }}</td>
                        <td>{{ $log->entity_id }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
