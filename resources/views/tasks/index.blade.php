@extends('main')

@section('contents')
    <table>
        <thead>
            <tr><th colspan="3">Task list</th></tr>
            <tr>
                <th colspan="3">
                    <form method="post" action="{{ route('tasks.store') }}">
                        <input type="text" name="name" placeholder="New task...">
                        <input type="submit" value="Create">
                    </form>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->getName() }}</td>
                <td>
                    <form method="post" action="{{ route('tasks.update', $task->getId()) }}">
                        <input name="_method" type="hidden" value="put">
                        <input type="submit" value="Done" {{ $task->isDone() ? 'disabled' : '' }}>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{ route('tasks.destroy', $task->getId()) }}">
                        <input name="_method" type="hidden" value="delete">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
