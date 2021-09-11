@extends('admin.layouts.master')

@section('title'.'create')
@endsection

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD NEW CATEGORY
                    </h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" id="name" class="form-control">
                                <label class="form-label">Category Name</label>
                            </div>
                        </div>
                        <a class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.category.index')}}">Back
                        </a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->
@endsection

@push('js')

@endpush
