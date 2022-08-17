@extends('master')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Developer</th>
                <th scope="col">Task Id</th>
                <th scope="col">Level</th>
                <th scope="col">Time</th>
                <th scope="col">Week</th>
            </tr>
        </thead>
        <tbody>
        @foreach($developersWithAssignTasks as $developer)
            @foreach($developer['assignedTasks'] as $key => $tasks)
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{ $developer['id'] }}</th>
                        <td>{{ $developer['developer'] }}</td>
                        <td>{{ $task['task_id'] }}</td>
                        <td>{{ $task['level'] }}</td>
                        <td>{{ $task['time'] }}</td>
                        <td>{{ $key }}</td>
                    </tr>
                @endforeach
            @endforeach
        @endforeach
        </tbody>
    </table>
@endsection
