@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline-block ">Category Update</h3>
                        <a href="{{route('categories.index')}}"
                           class="d-inline-block btn btn-sm btn-warning float-right">Back</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('categories.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" id="name">
                                @error('name')<strong class="text-danger">{{ $errors->first('name') }}</strong>@enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{$category->description}}</textarea>
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label mr-5" for="active">
                                    <input type="radio" {{$category->status == 1 ? 'checked' : '' }} name="status" class="form-check-input" id="active" value="active"> Active
                                </label>
                                <label class="form-check-label" for="inactive">
                                    <input type="radio" {{$category->status == 0 ? 'checked' : '' }} name="status" class="form-check-input" id="inactive" value="inactive"> Inactive
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
