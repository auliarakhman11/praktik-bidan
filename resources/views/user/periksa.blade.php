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
            <h1 class="m-0 text-dark">Periksa</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @livewire('periksa-index', ['users_id' => Auth::user()->id]
      )
      </div><!--/. container-fluid -->
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
  //periksa
  window.livewire.on('periksaStored', () => {
      $('#insertperiksa').modal('hide');
      Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
          title: 'Data periksa berhasil ditambahkan'
          });
  });

  window.livewire.on('periksaDeleted', () => {
      $('#deleteperiksa').modal('hide');
      Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
          title: 'Data Periksa berhasil dihapus'
          });
  });

  window.livewire.on('periksaUpdated', () => {
      $('#updateperiksa').modal('hide');
      Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
          title: 'Data periksa berhasil diedit'
          });
  });

</script>

@endsection

  @endsection