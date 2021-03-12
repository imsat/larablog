@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline-block ">Category Show</h3>
                        <a href="{{route('categories.index')}}"
                           class="d-inline-block btn btn-sm btn-warning float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <table class="table text-center">
                           <tbody>
                           <tr>
                               <th>Name: </th>
                               <td>{{$category->name}}</td>
                           </tr>
                           <tr>
                               <th>Description: </th>
                               <td>{{$category->description}}</td>
                           </tr>
                           <tr>
                               <th>Status: </th>
                               <td>
                                   <span class="badge {{$category->status == 1 ? 'badge-success' : 'badge-danger'}}">{{$category->status == 1 ? 'Active' : 'Inactive'}}</span>
                               </td>
                           </tr>
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
