@extends('layout.base')

@section('title')
    Task List
@endsection

@section('content')
    <div class="col-12">
        <div class="row">
            <h1>TASK LIST</h1>
            <table class="table table-striped">
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
                                <img src="{{ asset('storage/images/' . $task->image) }}" alt="" style="width: 100px; height: 100px; overflow: hidden ">
                            </td>
                            <td><a href="#" class="btn btn-info">Edit</a>  <a href="#" class="btn btn-info">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>
                <a href="{{ route('welcome') }}" class="btn btn-info">BACK</a>
            </div>
        </div>
    </div>
@endsection
