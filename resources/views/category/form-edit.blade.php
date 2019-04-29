@extends('layout2')

@section('pageHeader', 'Edit List Anggota')

@section('isi')

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-6 offset-md-3 mr-auto ml-auto">
                        <div class="card">
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
                            <form action="/admin/categories/{{ $categories->id }}" method="POST" class="form">
                                @csrf
                                @method("PUT")
                                <div class="card-header">
                                    <h1>
                                        <strong>Edit</strong> <small> Data Product Categories </small>
                                    </h1>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <label for="c_address" class="text-black">Nama Kategori Produk<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Masukkan Nama Kategori Produk" value="{{ $categories->category_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-success btn-lg active">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@stop
