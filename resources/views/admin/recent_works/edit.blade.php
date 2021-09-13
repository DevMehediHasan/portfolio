@extends('admin.layouts.master')

@push('css')
    <!-- Bootstrap Tagsinput Css -->
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endpush
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
                            <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('categories' ? 'focused error' : '') }}">
                                <label for="category_id">Select Categories</label>
                                <select name="category_id" id="category" class="form-control" multiple>
                                    <option value="">select one</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                    value="{{$category->id}}">{{ $category->name }}
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="image"> Featured Image</label>
                                <img src="{{url('uploads/work/'.$recentWorks->image)}}" width="120" height="120" alt="">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <label> Description</label>
                                <br>
                                <textarea name="description" id="tinymce" cols="60" rows="10">{!! $recentWorks->description !!}</textarea>
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
@push('js')
    <!-- Select Plugin Js -->
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <!-- TinyMCE -->
    <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>

    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('assets/backend/plugins/tinymce')}}';
        });
    </script>
@endpush
