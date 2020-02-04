@extends('layout.master')
@section('page-name','edit category')
@section('content')

    <form method="post" action="{{route('categories.update',$category->id)}}">
        @csrf
        <div class="form-group" >
            <label >Name</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
