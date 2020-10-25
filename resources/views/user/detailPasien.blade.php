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
            <h1 class="m-0 text-dark">Detail Pasien</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pasien">Pasie</a></li>
              <li class="breadcrumb-item active">Detail Tindakan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('edit'))
                            <div class="alert alert-info" role="alert">
                                {{session('edit')}}
                            </div>
         @endif
         @if(session('success'))
                            <div class="alert alert-info" role="alert">
                                {{session('success')}}
                            </div>
         @endif
         <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertnotification">
          Tambah Pengingat
         </button>
        <div class="row mb-2">
          <div class="col-6">
            <form action="/pasien/edit" method="POST">
              @csrf
              <input type="hidden" class="form-control" id="id" name="id" value="{{$pasien->id}}">
            <div class="form-group">
              <label for="nm_ibu">Nama Ibu</label>
              <input type="text" class="form-control" id="nm_ibu" name="nm_ibu" value="{{$pasien->nm_ibu}}">
          </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="nm_ayah">Nama Ayah</label>
              <input type="text" class="form-control" id="nm_ayah" name="nm_ayah" value="{{$pasien->nm_ayah}}">
          </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="no_tlpn">No Telepon</label>
              <input type="number" class="form-control" id="no_tlpn" name="no_tlpn" value="{{$pasien->no_tlpn}}">
          </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{$pasien->alamat}}">
          </div>
        </div>
        <div class="col-12"><button type="submit" class="btn btn-primary">Update</button></div>        
          </div>
          
      </form>
        @livewire('kb-index', ['pasienId' => $pasien->id,
                                'nm_ibu' => $pasien->nm_ibu,
                                'nm_ayah' => $pasien->nm_ayah,
                                'alamat' => $pasien->alamat,
                                'no_tlpn' => $pasien->no_tlpn,
                                'users_id' => Auth::user()->id]
                                )
      @livewire('persalinan-index', ['pasienId' => $pasien->id,
      'nm_ibu' => $pasien->nm_ibu,
      'nm_ayah' => $pasien->nm_ayah,
      'alamat' => $pasien->alamat,
      'no_tlpn' => $pasien->no_tlpn,
      'users_id' => Auth::user()->id]
      )
      @livewire('imunisasi-index', ['pasienId' => $pasien->id,
      'nm_ibu' => $pasien->nm_ibu,
      'nm_ayah' => $pasien->nm_ayah,
      'alamat' => $pasien->alamat,
      'no_tlpn' => $pasien->no_tlpn,
      'users_id' => Auth::user()->id]
      )
      @livewire('periksa-index', ['pasienId' => $pasien->id,
      'nm_ibu' => $pasien->nm_ibu,
      'nm_ayah' => $pasien->nm_ayah,
      'alamat' => $pasien->alamat,
      'no_tlpn' => $pasien->no_tlpn,
      'users_id' => Auth::user()->id]
      )
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
         <!-- Modal Insert -->
         <div class="modal fade" id="insertnotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-gradient-purple">
                      <h5 class="modal-title" id="exampleModalLabel">Form Notification</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true close-btn">×</span>
                      </button>
                  </div>
                 <div class="modal-body">
                      <form method="POST" action="/pasien/notification">
                        @csrf
                        <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                          <div class="row">
                              <div class="col-12">
                               <div class="form-group">
                                   <label for="exampleFormControlInput2" class="text-purple">Keterangan</label>
                                   <input type="text" name="ket" id="" class="form-control border-primary text-purple @error('ket') is-invalid @enderror" placeholder="Keterangan">
                                    @error('ket')
                                        <span class="invalid feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                              </div>
                              <div class="col-12">
                               <div class="form-group">
                                   <label for="exampleFormControlInput1" class="text-purple">Tanggal</label>
                                   <input type="date" name="tgl" id="" class="form-control border-primary text-purple @error('tgl') is-invalid @enderror" placeholder="Tanggal">
                                    @error('tgl')
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

//imunisasi
window.livewire.on('imunisasiStored', () => {
        $('#insertimunisasi').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data Imunisasi berhasil ditambahkan'
            });
    });

    window.livewire.on('imunisasiDeleted', () => {
        $('#deleteimunisasi').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data Imunisasi berhasil dihapus'
            });
    });

    window.livewire.on('imunisasiUpdated', () => {
        $('#updateimunisasi').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data imunisasi berhasil diedit'
            });
    });

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