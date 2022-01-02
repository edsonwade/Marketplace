@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Store</div>
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name Product</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'border-danger': ''}}"
                                       id="name" name="name" value="{{old('name')}}">
                                <small class="form-text text-danger">{{$errors->first('name')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="user">Store</label>
                                <select class="form-control {{$errors->has('user') ? 'border-danger': ''}}"
                                        id="user" name="user" value="{{old('user')}}">
                                    @foreach($stores as $store)
                                        <option value="{{$store->id}}">{{$store->name}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-danger">{{$errors->first('user')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control {{$errors->has('slug') ? 'border-danger': ''}}"
                                       id="slug" name="slug" value="{{old('slug')}}">
                                <small class="form-text text-danger">{{$errors->first('slug')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{$errors->has('description') ? 'border-danger': ''}} "
                                          id="description" value="{{old('description')}}"
                                          name="description" rows="5"></textarea>
                                <small class="form-text text-danger">{{$errors->first('description')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea type="body"
                                          class="form-control {{$errors->has('body') ? 'border-danger': ''}}"
                                          id="body" name="body" value="{{old('body')}}"></textarea>
                                <small class="form-text text-danger">{{$errors->first('body')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" class="form-control {{$errors->has('price') ? 'border-danger': ''}}"
                                       id="price" name="price" value="{{old('price')}}">
                                <small class="form-text text-danger">{{$errors->first('price')}}</small>
                            </div>
                            <input style="margin-top: 100px;" class="btn btn-primary " type="submit" value="Save Store">
                        </form>
                        <a style="margin-bottom: 900px;" class="btn btn-primary  float-right"
                           href="{{route('product.index')}}"><i
                                class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
