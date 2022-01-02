@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="card p-2">
                    <h3 align="center">Products</h3>
                    <div class="table-responsive">
                        <table id="product" class="table table-striped display" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Store_id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Body</th>
                                <th scope="col">Price</th>

                            </tr>
                            </thead>
                            @foreach($products as $product)
                                <tr>
                                    <tbody>

                                    <td>{{$product->id}}</td>
                                    <td>{{$product->store_id}}</td>
                                    <td>{{$product->nome}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->body}}</td>
                                    <td>&euro; {{$product->price}}</td>
                                    <td>

                                        <a class="btn btn-sm btn-outline-success
" href="{{route('product.edit',['product'=>$product->id])}}">
                                            Edit Store
                                        </a>
                                    </td>
                                    <td>
                                        <form
                                            action="{{route('product.destroy',['product'=>$product->id])}}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input class="btn btn-sm  btn-outline-danger" type="submit" value="delete">
                                        </form>

                                    </td>


                                    </tbody>


                                </tr>
                            @endforeach
                        </table>
                        {{$products->links()}}

                        <div class="mt-4">
                            <a href="{{route('product.create')}}" class=" btn btn-success btn-lg"> <i
                                    class="fas fa-plus-circle"></i> Create Products </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
