@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Store</div>
                    <div class="card-body">
                        <form action="{{route('admin.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name Store</label>
                                <input type="text" class="form-control {{$errors->has('name') ? 'border-danger': ''}}"
                                       id="name" name="name" value="{{old('name')}}">
                                <small class="form-text text-danger">{{$errors->first('name')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="user">User</label>
                                <select class="form-control {{$errors->has('user') ? 'border-danger': ''}}"
                                        id="user" name="user" value="{{old('user')}}">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
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
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control {{$errors->has('phone') ? 'border-danger': ''}}"
                                       id="phone" name="phone" value="{{old('phone')}}">
                                <small class="form-text text-danger">{{$errors->first('phone')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{$errors->has('description') ? 'border-danger': ''}} "
                                          id="description" value="{{old('description')}}"
                                          name="description" rows="5"></textarea>
                                <small class="form-text text-danger">{{$errors->first('description')}}</small>
                            </div>
                            <input style="margin-top: 100px;" class="btn btn-primary " type="submit" value="Save Store">
                        </form>
                        <a style="margin-bottom: 900px;" class="btn btn-primary  float-right"
                           href="{{route('admin.index')}}"><i
                                class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
