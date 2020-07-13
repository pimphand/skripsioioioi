@extends('layouts.back.main')

@section('title')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>@lang('menu.home.index')</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">@lang('menu.home.index')</li>
      </ol>
    </div>
  </div>
@endsection

@section('content')
  <!-- form start -->
             <form action="{{ route('doctor.store') }}" method="POST">
				 @csrf
			   <div class="card-body">
                  <div class="form-group">
				  <div class="form-group">
                  
                  <label for="Nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="name" placeholder="Masukan Nama">
                      </div>
                    <label for="str">STR</label>
                    <input type="number" name="str" class="form-control" id="str" placeholder="Masukan no STR">
                  </div>
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Masukan Title">
                  </div>
				            <div class="form-group">
                    <label for="place">Tempat</label>
                    <input type="text" name="place" class="form-control" id="place" placeholder="Masukan Tempat">
                  </div>
				              <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Masukan Tempat">
                  </div>
                  <div class="form-group">
                    <label for="graduated">graduated</label>
                    <input type="text" name="graduated" class="form-control" id="graduated" placeholder="Masukan Tempat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->
                                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- <form action="{{ route('doctor.updateImage', $doctors) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-2 text-center">
                    <img id="imageView" class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->image ? asset('dist/img/user/'.Auth::user()->image) : asset('dist/img/avatar5.png') }}?{{ \Carbon\Carbon::now()->format('dFYhms') }}" alt="User profile picture">
                  </div>
                  <div class="col-sm-10">
                    <label for="name">Foto</label>
                    <small>Max. 2Mb, Disarankan rasio 1:1</small>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image" accept="image/*">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" class="input-group-text">Upload</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form> -->
            </div>
@endsection