@extends('admin.layouts.master')

@section('content')

    <!-- Vertical Layout | With Floating Label -->
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{route('admin.recent-work.update', $recentWorks->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT POST
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="title" id="name" class="form-control" value="{{ $recentWorks->title }}">
                                    <label class="form-label">Post Title</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image"> Featured Image</label>
                                <img src="{{url('storage/work/'.$recentWorks->image)}}" width="120" height="120" alt="">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <label> Description</label>
                                <br>
                                <textarea name="description" id="tinymce" cols="60" rows="10">{{ $recentWorks->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Vertical Layout | With Floating Label -->
@endsection
