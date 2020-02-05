@extends('layout.master')
@section('page-name','add new category')
@section('content')

    <form method="post" action="{{route('categories.store')}}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            @if($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
