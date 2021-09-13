@extends('admin.layouts.master')

@section('title','Category')

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout | With Floating Label -->
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT CATEGORY
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" class="form-control"value="{{$category->name}}">
                                    <label class="form-label">Category Name</label>
                                </div>
                            </div>
                            <a class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.category.index')}}">Back
                            </a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Vertical Layout | With Floating Label -->
@endsection

@push('js')

@endpush
