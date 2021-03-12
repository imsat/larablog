@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline-block ">Category Create</h3>
                        <a href="{{route('categories.index')}}"
                           class="d-inline-block btn btn-sm btn-warning float-right">Back</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('categories.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                                @error('name')<strong class="text-danger">{{ $errors->first('name') }}</strong>@enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label mr-5" for="active">
                                    <input type="radio" checked name="status" class="form-check-input" id="active" value="active"> Active
                                </label>
                                <label class="form-check-label" for="inactive">
                                    <input type="radio" name="status" class="form-check-input" id="inactive" value="inactive"> Inactive
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
