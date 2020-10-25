@extends('template.master')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $title }}</h1>
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
          <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertuser">
            Tambah Data
           </button>
           @if (session('success'))
           <div class="alert alert-success" role="alert">
               {{ session('success') }}
           </div>
           @endif            
          @livewire('users-index')
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
         <!-- Modal Insert -->
         <div class="modal fade" id="insertuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-gradient-purple">
                      <h5 class="modal-title" id="exampleModalLabel">Form User Baru</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true close-btn">×</span>
                      </button>
                  </div>
                 <div class="modal-body">
                      <form method="POST" action="/users/store">
                        @csrf
                          <div class="row">
                              <div class="col-12">
                               <div class="form-group">
                                   <label for="exampleFormControlInput2" class="text-purple">User Name</label>
                                   <input type="text" name="name" id="" class="form-control border-primary text-purple @error('name') is-invalid @enderror" placeholder="User Name">
                                    @error('name')
                                        <span class="invalid feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                              </div>
                              <div class="col-12">
                               <div class="form-group">
                                   <label for="exampleFormControlInput1" class="text-purple">Email</label>
                                   <input type="email" name="email" id="" class="form-control border-primary text-purple @error('email') is-invalid @enderror" placeholder="Email">
                                    @error('email')
                                        <span class="invalid feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                              </div>
                              <div class="col-12">
                               <div class="form-group">
                                   <label for="exampleFormControlInput1" class="text-purple">Password</label>
                                   <input type="password" name="password" id="" class="form-control border-primary text-purple @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <span class="invalid feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                              </div>
                              <div class="col-12">
                               <div class="form-group">
                                   <label for="exampleFormControlInput1" class="text-purple">Konfirmasi Password</label>
                                   <input type="password" name="password_confirmation" id="" class="form-control border-primary text-purple @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
                                    @error('password_confirmation')
                                        <span class="invalid feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                              </div>                               
                          </div>
                          
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                      <button type="submit"  class="btn btn-primary close-modal">Insert</button>
                   </form>
                   
                  </div>
              </div>
          </div>
      </div>

  @endsection