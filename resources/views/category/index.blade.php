@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline-block ">Category</h3>
                        <a href="{{route('categories.create')}}" class="d-inline-block btn btn-sm btn-primary float-right">Add New</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th style="width: 5%;">Id</th>
                                <th style="width: 25%;">Name</th>
                                <th style="width: 35%;">Description</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 25%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="{{route('categories.status-change', $category->id)}}">
                                            <span class="badge {{$category->status == 1 ? 'badge-success' : 'badge-danger'}}" onclick="return confirm('Are you sure to change?')">
                                           {{$category->status == 1 ? 'Active' : 'Inactive'}}
                                        </span>
                                        </a>
{{--                                        @if($category->status == 1)--}}
{{--                                            <span class="badge badge-success">Active</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge badge-danger">Inactive</span>--}}
{{--                                        @endif--}}
                                    </td>
                                <td>
                                    <a href="{{route('categories.show', $category->id)}}" title="Show" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{route('categories.edit', $category->id)}}" title="Edit" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{route('categories.destroy', $category->id)}}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                       <span class="d-flex justify-content-center"> {{$categories->links()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
