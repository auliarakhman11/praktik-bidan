<div>
<div class="card">
    <div class="card-header bg-gradient-purple">
        <h3 class="card-title">Table Data KB</h3>
    </div>
    <div class="card-body table-responsive">
        @if (!empty($pasienId))
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertkb">
            Tambah Data
           </button>
        @endif        
           
        <div class="row">
            <div class="col">
                <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>
            @if (empty($pasienId))
                <div class="col">
                    <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
                </div>
                @endif
        </div>
        <hr>
        @if (!empty($pasienId))
        <table class="table table-hover table-sm table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Askeptor</th>
                <th scope="col">Umur Ibu</th>
                <th scope="col">Umur Ayah</th>
                <th scope="col">Jumlah Anak</th>
                <th scope="col">Jenis Kontrasepsi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            {{-- @php
                $no=0
            @endphp --}}
                
                @foreach ($kb as $datakb)
                {{-- @php
                    $no++ 
                @endphp                      --}}
            <tr>                         
                {{-- <td scope="row">{{ $no }}</td> --}}
                <td scope="row">{{ $datakb->askeptor }}</td>
                <td scope="row">{{ $datakb->umur_ibu }}</td>
                <td scope="row">{{ $datakb->umur_ayah }}</td>
                <td scope="row">{{ $datakb->jml_anak }}</td>
                <td scope="row">{{ $datakb->jns_kontrasepsi }}</td>
                <td scope="row">{{ date_format($datakb->created_at, 'd-m-Y') }}</td>
                <td scope="row">
                    <button wire:click="getKb({{ $datakb->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updateKb">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button wire:click="getKb({{ $datakb->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deleteKb">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <table class="table table-hover table-sm table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Kode Pasien</th>
                <th scope="col">Nama Ibu</th>
                <th scope="col">Askeptor</th>
                <th scope="col">Umur Ibu</th>
                <th scope="col">Umur Ayah</th>
                <th scope="col">Jumlah Anak</th>
                <th scope="col">Jenis Kontrasepsi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            {{-- @php
                $no=0
            @endphp --}}
                
                @foreach ($kb as $datakb)
                {{-- @php
                    $no++ 
                @endphp                      --}}
            <tr>                         
                {{-- <td scope="row">{{ $no }}</td> --}}
                <td scope="row">{{ $datakb->kd_pasien }}</td>
                <td scope="row">{{ $datakb->nm_ibu }}</td>
                <td scope="row">{{ $datakb->askeptor }}</td>
                <td scope="row">{{ $datakb->umur_ibu }}</td>
                <td scope="row">{{ $datakb->umur_ayah }}</td>
                <td scope="row">{{ $datakb->jml_anak }}</td>
                <td scope="row">{{ $datakb->jns_kontrasepsi }}</td>
                <td scope="row">{{ date_format($datakb->created_at, 'd-m-Y') }}</td>
                <td scope="row">
                    <button wire:click="getKb({{ $datakb->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updateKb">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button wire:click="getKb({{ $datakb->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deleteKb">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
        
        {{ $kb->links() }}
    </div>
    
        
       
       <!-- Modal Insert -->
       <div wire:ignore.self class="modal fade" id="insertkb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
               <div class="modal-content">
                   <div class="modal-header bg-gradient-purple">
                       <h5 class="modal-title" id="exampleModalLabel">Form Data KB</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                       </button>
                   </div>
                  <div class="modal-body">
                       <form wire:submit.prevent="store">
                           <div class="row">
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2" class="text-purple">Umur Ayah</label>
                                    <input wire:model="umur_ayah" type="number" name="umur_ayah" id="" class="form-control border-primary text-purple @error('umur_ayah') is-invalid @enderror" placeholder="Umur Ayah">
                                     @error('umur_ayah')
                                         <span class="invalid-feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Umur Ibu</label>
                                    <input wire:model="umur_ibu" type="number" name="umur_ibu" id="" class="form-control border-primary text-purple @error('umur_ibu') is-invalid @enderror" placeholder="Umur Ibu">
                                     @error('umur_ibu')
                                         <span class="invalid-feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Askeptor</label>
                                    <select wire:model='askeptor' class="form-control border-primary text-purple @error('askeptor') is-invalid @enderror" name="askeptor">
                                        <option selected value="Baru">Pilih Askeptor</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Lama">Lama</option>
                                      </select>
                                     @error('askeptor')
                                         <span class="invalid-feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Jenis Kontrasepesi</label>
                                    <select wire:model='jns_kontrasepsi' class="form-control border-primary text-purple @error('jns_kontrasepsi') is-invalid @enderror" name="jns_kontrasepsi">
                                        <option selected value="">Pilih Kontrasepsi</option>
                                        <option value="Suntik 1 Bulan">Suntik 1 Bulan</option>
                                        <option value="Suntik 3 Bulan">Suntik 3 Bulan</option>
                                        <option value="Pil Kombinasi">Pil Kombinasi</option>
                                        <option value="Pil Laktasi">Pil Laktasi</option>
                                        <option value="IUD">IUD</option>
                                        <option value="Implant">Implant</option>
                                      </select>
                                     @error('jns_kontrasepsi')
                                         <span class="invalid-feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Jumlah Anak</label>
                                    <input wire:model="jml_anak" type="number" name="jml_anak" id="" class="form-control border-primary text-purple @error('jml_anak') is-invalid @enderror" placeholder="Jumlah Anak">
                                     @error('jml_anak')
                                         <span class="invalid-feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Post Partum</label>
                                    <input wire:model="post_partum" type="text" name="post_partum" id="" class="form-control border-primary text-purple @error('post_partum') is-invalid @enderror" placeholder="Post Partum">
                                     @error('post_partum')
                                         <span class="invalid-feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Keterangan</label>
                                    <input wire:model="ket" type="text" name="ket" id="" class="form-control border-primary text-purple @error('ket') is-invalid @enderror" placeholder="Keterangan">
                                     @error('ket')
                                         <span class="invalid-feedback">
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
                    <div wire:loading wire:target="store">
                        <div style="color: #9561e2" class="la-line-scale-pulse-out">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Modal Delete -->
    <div wire:ignore.self class="modal fade" id="deleteKb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete data KB</h5>
            <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>Apakah anada yakin ingin menghpus data KB</p>
            </div>
            <div class="modal-footer">
            <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click="deleteKb({{$kbId}})" type="button" class="btn btn-danger">Delete</button>
            <div wire:loading wire:target="deleteKb">
                <div style="color: #e3342f" class="la-line-scale-pulse-out">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Update-->
    <div wire:ignore.self class="modal fade" id="updateKb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mr-1" id="exampleModalLabel">Upate Data Kb</h5>
                    <div wire:loading wire:target="getKb">
                        <div style="color: #9561e2" class="la-line-scale-pulse-out">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <button wire:click.prevent="resetInput()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form wire:submit.prevent="update">
                        {{-- <input wire:model="kbId" type="hidden" name=""> --}}
                        <div class="row">
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput2" class="text-purple">Umur Ayah</label>
                                 <input wire:model="umur_ayah" type="number" name="umur_ayah" id="" class="form-control border-primary text-purple @error('umur_ayah') is-invalid @enderror" placeholder="Umur Ayah">
                                  @error('umur_ayah')
                                      <span class="invalid-feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1" class="text-purple">Umur Ibu</label>
                                 <input wire:model="umur_ibu" type="number" name="umur_ibu" id="" class="form-control border-primary text-purple @error('umur_ibu') is-invalid @enderror" placeholder="Umur Ibu">
                                  @error('umur_ibu')
                                      <span class="invalid-feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1" class="text-purple">Askeptor</label>
                                 <select wire:model='askeptor' class="form-control border-primary text-purple @error('askeptor') is-invalid @enderror" name="askeptor">
                                     <option value="Baru">Baru</option>
                                     <option value="Lama">Lama</option>
                                   </select>
                                  @error('askeptor')
                                      <span class="invalid-feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1" class="text-purple">Jenis Kontrasepesi</label>
                                 <select wire:model='jns_kontrasepsi' class="form-control border-primary text-purple @error('jns_kontrasepsi') is-invalid @enderror" name="jns_kontrasepsi">
                                     <option value="Suntik 1 Bulan">Suntik 1 Bulan</option>
                                     <option value="Suntik 3 Bulan">Suntik 3 Bulan</option>
                                     <option value="Pil Kombinasi">Pil Kombinasi</option>
                                     <option value="Pil Laktasi">Pil Laktasi</option>
                                     <option value="IUD">IUD</option>
                                     <option value="Implant">Implant</option>
                                   </select>
                                  @error('jns_kontrasepsi')
                                      <span class="invalid-feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1" class="text-purple">Jumlah Anak</label>
                                 <input wire:model="jml_anak" type="number" name="jml_anak" id="" class="form-control border-primary text-purple @error('jml_anak') is-invalid @enderror" placeholder="Jumlah Anak">
                                  @error('jml_anak')
                                      <span class="invalid-feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1" class="text-purple">Post Partum</label>
                                 <input wire:model="post_partum" type="text" name="post_partum" id="" class="form-control border-primary text-purple @error('post_partum') is-invalid @enderror" placeholder="Post Partum">
                                  @error('post_partum')
                                      <span class="invalid-feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-12">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1" class="text-purple">Keterangan</label>
                                 <input wire:model="ket" type="text" name="ket" id="" class="form-control border-primary text-purple @error('ket') is-invalid @enderror" placeholder="Keterangan">
                                  @error('ket')
                                      <span class="invalid-feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>                             
                            
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary close-modal">Update</button>
                 </form>
                 <div wire:loading wire:target="update">
                    <div style="color: #9561e2" class="la-line-scale-pulse-out">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                 </div>
                </div>
            </div>
        </div>
    </div>

</div>



</div>
