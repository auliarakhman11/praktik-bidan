@extends('template.master')
@section('content')

@section('swalcss')
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/build/scss/loading.scss">
@endsection
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">KB</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @livewire('kb-index', ['users_id' => Auth::user()->id])
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @section('swaljs')
  <!-- SweetAlert2 -->
<script src="{{asset('adminlte')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
@endsection

@section('footer')
<script type="text/javascript">
  window.livewire.on('kbStored', () => {
      $('#insertkb').modal('hide');
      Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
          title: 'Data KB berhasil ditambahkan'
          });
  });

  window.livewire.on('kbDeleted', () => {
      $('#deleteKb').modal('hide');
      Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
          title: 'Data KB berhasil dihapus'
          });
  });

  window.livewire.on('kbUpdated', () => {
      $('#updateKb').modal('hide');
      Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
          title: 'Data KB berhasil diedit'
          });
  });

</script>

@endsection

  @endsection