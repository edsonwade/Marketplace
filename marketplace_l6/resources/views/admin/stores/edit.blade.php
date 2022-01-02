@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Store</div>
                    <div class="card-body">
                        <form action="{{route('admin.index')}}/{{$store->id}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'border-danger': ''}}"
                                       id="name" name="name" value="{{$store->name ?? old('name')}}">
                                <small class="form-text text-danger">{{$errors->first('name')}}</small>
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control {{$errors->has('slug') ? 'border-danger': ''}}"
                                       id="slug" name="slug" value="{{$store->slug ?? old('slug')}}">
                                <small class="form-text text-danger">{{$errors->first('slug')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control {{$errors->has('phone') ? 'border-danger': ''}}"
                                       id="phone" name="phone" value="{{$store->phone ?? old('phone')}}">
                                <small class="form-text text-danger">{{$errors->first('phone')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{$errors->has('description') ? 'border-danger': ''}} "
                                          id="description" value="{{$store->description ?? old('description')}}"
                                          name="description" rows="5"></textarea>
                                <small class="form-text text-danger">{{$errors->first('description')}}</small>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Update Store">
                        </form>
                        <a class="btn btn-primary float-right" href="{{route('admin.index')}}"><i
                                class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
