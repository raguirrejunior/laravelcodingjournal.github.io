@extends('layout')
@section('content')
    <style>
            .container {
                max-width: auto;
            }
            .push-top {
                margin-top:50px;
            }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div><br>
        @endif
                <table class="table">
                    <thead>
                        <tr class="table-warning">
                            <th>ID</th>
                            <th>Type</th>
                            <th>Details</th>
                            <th>Action Taken</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taskthoughts as $cl)
                            <tr>
                                <td>{{$cl->id}}</td>
                                <td>{{$cl->type}}</td>
                                <td>{{$cl->details}}</td>
                                <td>{{$cl->actiontaken}}</td>
                                <td>
                                    <a href="{{route('taskthoughts.edit', $cl->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{route('taskthoughts.destroy', $cl->id)}}" method="post">
                                    @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-block btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
@endsection