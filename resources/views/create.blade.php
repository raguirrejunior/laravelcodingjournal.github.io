@extends('layout')
@section('content')
    <style>
        .container {
            max-width: 408px;
        }
        .push-top {
            margin: 50px;
        }
    </style>
        <div class="card push-top">
            <div class="card-header">
                Add New Task/Thoughts
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert=danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div><br>
                @endif
                <form action="{{route('taskthoughts.store')}}" method="post">
                    <div>
                        <div class="form-group">
                            @csrf 
                                <label for="type">Type:</label>
                                <!-- <input type="text" name="type" id="type"> -->
                                <select class="form-select form-control" aria-label="Default select example" name="type" id="type">
                                <option selected>Select Type from the List</option>
                                <option value="Task">Task</option>
                                <option value="Thoughts">Thoughts</option>
                                </select>
                        </div><br>
                        <div class="form-group"></div>
                                <label for="details">Details:</label>
                                <textarea class="form-control" name="details" id="details" cols="30" rows="4" ></textarea><br>
                        </div>
                        <div class="form-group"></div>
                                <label for="actiontaken">Action Taken:</label>
                                <textarea class="form-control" name="actiontaken" id="actiontaken" cols="30" rows="4" ></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-danger form-control" type="submit" onsubmit="">Add New Task/Thoughts</button><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
@endsection