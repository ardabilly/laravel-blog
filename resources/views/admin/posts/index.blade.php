@extends('layouts.admin.app')
@section('assets-top')
<link href="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container-fluid">
   <ol class="breadcrumb">
       <li class="breadcrumb-item">
           <a href="#">Posts</a>
       </li>
       <li class="breadcrumb-item active">Table</li>
   </ol>
   <div class="card mb-3">
       <div class="card-header">
           <i class="fa fa-list"></i>Posts
           <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">Add New</a>
       </div>
       <div class="card-boddy table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                   <tr>
                       <th>No</th>
                       <th>ID</th>
                       <th>TITLE</th>
                       <th>AUTHOR</th>
                       <th>CATEGORY</th>
                       <th>PUBLISH</th>
                       <th></th>
                   </tr>
               </thead>
               <tfoot>
                   <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>AUTHOR</th>
                        <th>CATEGORY</th>
                        <th>PUBLISH</th>
                        <th></th>
                    </tr>
               </tfoot>
               <tbody>

               </tbody>
           </table>
       </div>
   </div>
</div>
@endsection
@section('assets-bottom')
<script src="{{ asset('assets/blog-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
    $("#document").ready(function(){
        $("#dataTable").DataTable({
                processing: true,
                serverSide: true,
                responsive:true,
                ajax: "{{ route('api.datatable.posts') }}",
                columns: [
                    {data: 'DT_Row_Index',orderable: false, searchable: false},
                    {data: 'id',            name: 'id'},
                    {data: 'title',         name: 'title'},
                    {data: 'author',        name: 'author'},
                    {data: 'categories',    name: 'categories'},
                    {data: 'published_at',  name: 'published_at'},
                    {data: 'action',        name: 'action', orderable: false, searchable: false},

                ]

        })
    });
</script>
@endsection
