@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    <h3 align="center">product</h3>
                    <div class="table-responsive">
                        <table id="product" class="table table-striped display" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User_id</th>
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
                                    <td>{{$product->user_id}}</td>
                                    <td>{{$product->nome}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->body}}</td>
                                    <td>{{$product->price}}</td>

                                    </tbody>


                                </tr>
                            @endforeach
                        </table>
                        {{$products->links()}}


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
