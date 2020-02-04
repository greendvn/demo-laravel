@extends('layout.master')
@section('page-name','list product')
@section('content')

    @if(\Illuminate\Support\Facades\Session::has('succes'))
        {{ \Illuminate\Support\Facades\Session::get('succes')}}
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">image</th>
            <th scope="col">price</th>
            <th scope="col">category</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse( $products as $key => $product )
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$product->name}}</td>
                <td><img src="{{asset('storage/'.$product->image)}}"></td>
                <td>{{$product->price}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-danger">Edit</a>
                    <a href="{{route('products.delete',$product->id)}}" class="btn btn-danger"
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
