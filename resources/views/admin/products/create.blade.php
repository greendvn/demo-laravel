@extends('layout.master')
@section('page-name','add new product')
@section('content')

    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
            @if ($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </div>
        <div class="form-group">
            <label>Desc</label>
            <textarea class="form-control" name="desc" rows="2" required>{{old('desc')}}</textarea>
            @if ($errors->has('desc'))
                {{$errors->first('desc')}}
            @endif
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price" value="{{old('price')}}" required>
            @if ($errors->has('price'))
                {{$errors->first('price')}}
            @endif
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" name="content" rows="5" required >{{old('content')}}</textarea>
        </div>
        <div class="form-group">
            <label>image</label>
            <input type="file" class="form-control-file" name="image">
            @if ($errors->has('image'))
                {{$errors->first('image')}}
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
