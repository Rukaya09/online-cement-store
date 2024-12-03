@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
              <form method="POST" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name"  value="{{$category->name}}"id="form2Example1" class="form-control" placeholder="name" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="icon" id="form2Example1"  value="{{$category->icon}}" id class="form-control" placeholder="icon" />
                </div>
                <div class="form-outline mb-4 mt-4">
                   <label>Image</label>

             @if($category->image)
                <div class="mb-2">
                      <label>Current Image:</label><br>
                      <img src="{{ asset('assets/img/' . $category->image) }}" alt="Current Image" width="100">
                      <img src="{{ asset('public_path/' . $category->image) }}" alt="Current Image" width="100">

             </div>
             @endif
               <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
           </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>


              </form>

            </div>
          </div>
        </div>
      </div>
      @endsection
