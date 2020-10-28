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
            <h1 class="m-0 text-dark">Persalinan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#print"><i class="fas fa-print"></i> Print</button>
        @livewire('persalinan-index', [
      'users_id' => Auth::user()->id]
      )
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- Modal -->
<div class="modal fade" id="print" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Print Data Persalinan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('print.persalinan') }}" method="POST">
          @csrf
        <div class="row">
            <div class="col-6">
              <div class="form-group">
                  <label for="exampleFormControlInput1" class="text-purple">Bulan</label>
                  <select class="form-control border-primary text-purple @error('bulan') is-invalid @enderror" name="bulan">
                      <option selected>Pilih Bulan</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                   @error('bulan')
                       <span class="invalid-feedback">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
             </div>
             <div class="col-6">
              <div class="form-group">
                  <label for="exampleFormControlInput1" class="text-purple">Tahun</label>
                  <input wire:model="tahun" type="number" name="tahun" id="" class="form-control border-primary text-purple @error('tahun') is-invalid @enderror" placeholder="Tahun">
                   @error('tahun')
                       <span class="invalid-feedback">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
             </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Print</button>
      </form>
      </div>
    </div>
  </div>
</div>

  @section('swaljs')
    <!-- SweetAlert2 -->
<script src="{{asset('adminlte')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
@endsection

@section('footer')
<script type="text/javascript">
   //persalinan
    window.livewire.on('persalinanStored', () => {
        $('#insertpersalinan').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data Persalinan berhasil ditambahkan'
            });
    });

    window.livewire.on('persalinanDeleted', () => {
        $('#deletepersalinan').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data Persalinan berhasil dihapus'
            });
    });

    window.livewire.on('persalinanUpdated', () => {
        $('#updatepersalinan').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data persalinan berhasil diedit'
            });
    });



</script>

@endsection

  @endsection