@extends('template.master')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ganti Password</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif            
            <form action="{{ route('password.edit') }}" method="POST">
                @csrf
                @method("PATCH")
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput2" class="text-purple">Password Lama</label>
                            <input type="password" name="old_password" id="" class="form-control border-primary text-purple @error('old_password') is-invalid @enderror" placeholder="Password Lama">
                             @error('old_password')
                                 <div class="invalid-feedback">
                                     <strong>{{ $message }}</strong>
                                 </div>
                             @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="password" class="text-purple">Password Baru</label>
                            <input type="password" name="password" id="" class="form-control border-primary text-purple @error('password') is-invalid @enderror" placeholder="Password Baru">
                             @error('password')
                                 <span class="invalid-feedback">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="password_confirmation" class="text-purple">Confirmsi Password</label>
                            <input type="password" name="password_confirmation" id="" class="form-control border-primary text-purple " placeholder="Confirmsi Password">
                        </div>
                    </div>
                </div>
                <button type="submit"  class="btn btn-primary">Ganti Password</button>
            </form>
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection