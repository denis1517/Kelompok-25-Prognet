@extends('layout2')

@section('pageHeader', 'List Product')

@section('isi')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Data Product Categories</strong>
                        <a href="/admin/categories/create"><button type="button" class="btn btn-primary" style="float: right;">Tambah Product Category</button></a>
                    </div>   
                 <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product Category name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Status Aktif</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= sizeof($categories); $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $categories[$i-1]->category_name }}</td>
                                            <td>{{ $categories[$i-1]->created_at }}</td>
                                            <td>{{ $categories[$i-1]->updated_at }}</td>
                                            <td>
                                                @if( $categories[$i-1]->status_aktif == 1 )
                                                    Aktif
                                                @else
                                                    Non Aktif
                                                @endif
                                            </td>
                                            <td>
                                                @if( $categories[$i-1]->status_aktif == 1 )
                                                    <form action="/admin/categories/{{$categories[$i-1]->id}}/edit" method="GET">
                                                        <button type="submit">
                                                            <i class="fa fa-edit">Edit</i>
                                                        </button>
                                                    </form>
                                                    <form action="/admin/categories/{{$categories[$i-1]->id}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit">
                                                            <i class="fa fa-trash">Delete</i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@stop