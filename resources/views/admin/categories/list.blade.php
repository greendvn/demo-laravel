@extends('layout.master')
@section('page-name','list category')
@section('search','categories')
@section('content')

    @if(\Illuminate\Support\Facades\Session::has('succes'))
        {{ \Illuminate\Support\Facades\Session::get('succes')}}
    @endif
    <div>
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
              method="get" action="{{route('categories.search')}}">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" name="search"
                       placeholder="Search for categories"
                       aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Slug</th>
            <th scope="col">Total product</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse( $categories as $key => $category )
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->products->count()}}</td>
                <td>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-danger">Edit</a>
                    <a href="{{route('categories.delete',$category->id)}}" class="btn btn-danger"
                       onclick="return confirm('Bạn chắc chắn không')">Delete</a>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">No data</td>
            </tr>
        @endforelse


        </tbody>
    </table>
@endsection
