@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Product</div>
                    <div class="card-body">
                        <form action="{{route('product.index')}}/{{$product->id}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nome">Name</label>
                                <input type="text" class="form-control {{$errors->has('nome') ? 'border-danger': ''}}"
                                       id="nome" name="nome" value="{{$product->name ?? old('nome')}}">
                                <small class="form-text text-danger">{{$errors->first('name')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control {{$errors->has('slug') ? 'border-danger': ''}}"
                                       id="slug" name="slug" value="{{$product->slug ?? old('slug')}}">
                                <small class="form-text text-danger">{{$errors->first('slug')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{$errors->has('description') ? 'border-danger': ''}} "
                                          id="description" value="{{$product->description ?? old('description')}}"
                                          name="description" rows="5"></textarea>
                                <small class="form-text text-danger">{{$errors->first('description')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea type="text"
                                          class="form-control {{$errors->has('body') ? 'border-danger': ''}}"
                                          id="body" name="body" value="{{$product->body ?? old('body')}}"></textarea>
                                <small class="form-text text-danger">{{$errors->first('body')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" class="form-control {{$errors->has('price') ? 'border-danger': ''}}"
                                       id="price" name="price" value="{{$product->price ?? old('price')}}">
                                <small class="form-text text-danger">{{$errors->first('price')}}</small>
                            </div>

                            <input class="btn btn-primary mt-4" type="submit" value="Update Product">
                        </form>
                        <a class="btn btn-primary float-right" href="{{route('product.index')}}"><i
                                class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
