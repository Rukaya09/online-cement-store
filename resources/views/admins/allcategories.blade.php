@extends('layouts.admin')
@section('content')
         @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('update'))
            <div class="alert alert-success">{{ session('update') }}</div>
        @endif
        @if(session('delete'))
            <div class="alert alert-success">{{ session('delete') }}</div>
        @endif
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="{{route('categories.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allcategories as $category)
                  <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td><a  href="{{route('categories.edit',$category->id) }}" class="btn btn-warning text-white text-center ">Update </a></td>


                    <td><a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                 @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
      @endsection