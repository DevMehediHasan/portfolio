@extends('layouts.admin.app')

@section('title'.'post')
@endsection

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{route('admin.post.create')}}">
                <i class="material-icons">add</i>
                <span>Add new Post</span>
            </a>
        </div>
    </div>
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All Posts
                        <span class="badge bg-blue"> {{ $posts->count() }}</span>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th><i class="material-icons">visibility</i></th>
                                <th>Approved</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th><i class="material-icons">visibility</i></th>
                                <th>Approved</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($posts as $key=>$post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ str_limit($post->title, '10') }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->view_count }}</td>
                                    <td>
                                        @if($post->is_approved == true)
                                            <span class="badge bg-blue">Approved</span>
                                        @else
                                            <span class="badge bg-pink">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->status == true)
                                            <span class="badge bg-blue">Published</span>
                                        @else
                                            <span class="badge bg-pink">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>

                                        <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>

                                        <button type="button" class="btn btn-danger waves-effect" onclick="deletePost({{$post->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{$post->id}}" action="{{route('admin.post.destroy', $post->id)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}../../"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/dataTables.buttons.min.js')}}dataTables.buttons.min.js"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        //sweet alert
        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                    swal(
                        'Cancelled',
                        'Your Data is save :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
