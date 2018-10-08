@extends('layout.base')

@section('title')
    Tasks List
@endsection

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="title">
                Tasks List
            </div>

            <table class="table table-striped">
                <form method="GET" action="{{ route('task_search') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Search</button>
                        </div>
                        <input type="text" class="form-control" placeholder="Title or Content" name="searchTask">
                    </div>
                </form>
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Task title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Created</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($tasks) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <img src="{{ asset('storage/images/' . $task->image) }}" alt=""
                                     style="width: 100px; height: 100px; overflow: hidden ">
                            </td>
                            <td><a href="#" class="btn btn-info">Edit</a> <a
                                    href="#" id="{{ $task->id }}" class="btn btn-info delete-task">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $tasks->appends(request()->query()) }}
            <div>
                <a href="{{ route('welcome') }}" class="btn btn-info">BACK</a>
            </div>
        </div>
    </div>
@endsection

@section('ajax')
    <script>
        $(document).ready(function () {
            $('.delete-task').click(function () {
                var taskId = $(this).attr('id');
alert(taskId);
                // $.ajax({
                //     url: "http://localhost:8000/home/delete/"+ taskId,
                //     type: "GET",
                //     data: {
                //         'id': taskId
                //     },
                //     success: function (data) {
                //         window.location = "/";
                //     }
                // });
            });
        });
    </script>
@endsection
