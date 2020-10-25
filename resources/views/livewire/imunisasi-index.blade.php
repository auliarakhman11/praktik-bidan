<div>
    <div class="card">
        <div class="card-header bg-gradient-purple">
            <h3 class="card-title">Table Data Imunisasi</h3>
        </div>
        <div class="card-body table-responsive">
            @if (!empty($pasienId))
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertimunisasi">
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
                    <th scope="col">Nama Anak</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Imunisasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($imunisasi as $dataimunisasi)
                <tr>                         
                    <td scope="row">{{ $dataimunisasi->nm_anak }}</td>
                    <td scope="row">{{ date('d-m-Y', strtotime($dataimunisasi->tgl_lahir)) }}</td>
                    <td scope="row">{{ $dataimunisasi->umur }}</td>
                    <td scope="row">{{ $dataimunisasi->jns_imunisasi }}</td>
                    <td scope="row">{{ date('d-m-Y', strtotime($dataimunisasi->created_at)) }}</td>
                    <td scope="row">
                        <button wire:click="getImunisasi({{ $dataimunisasi->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updateimunisasi">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="getImunisasi({{ $dataimunisasi->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deleteimunisasi">
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
                    <th scope="col">Nama Anak</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Imunisasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($imunisasi as $dataimunisasi)
                <tr>
                    <td scope="row">{{ $dataimunisasi->kd_pasien }}</td>
                    <td scope="row">{{ $dataimunisasi->nm_ibu }}</td>                         
                    <td scope="row">{{ $dataimunisasi->nm_anak }}</td>
                    <td scope="row">{{ date('d-m-Y', strtotime($dataimunisasi->tgl_lahir)) }}</td>
                    <td scope="row">{{ $dataimunisasi->umur }}</td>
                    <td scope="row">{{ $dataimunisasi->jns_imunisasi }}</td>
                    <td scope="row">{{ date('d-m-Y', strtotime($dataimunisasi->created_at)) }}</td>
                    <td scope="row">
                        <button wire:click="getImunisasi({{ $dataimunisasi->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updateimunisasi">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="getImunisasi({{ $dataimunisasi->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deleteimunisasi">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            
            {{ $imunisasi->links() }}
        </div>
        
            
           
           <!-- Modal Insert -->
           <div wire:ignore.self class="modal fade" id="insertimunisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                   <div class="modal-content">
                       <div class="modal-header bg-gradient-purple">
                           <h5 class="modal-title" id="exampleModalLabel">Form Data Imunisasi</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                      <div class="modal-body">
                           <form wire:submit.prevent="store">
                               <div class="row">
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2" class="text-purple">Nama Anak</label>
                                        <input wire:model="nm_anak" type="text" name="nm_anak" id="" class="form-control border-primary text-purple @error('nm_anak') is-invalid @enderror" placeholder="Nama Anak">
                                         @error('nm_anak')
                                             <span class="invalid-feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Tanggl Lahir</label>
                                        <input wire:model="tgl_lahir" type="date" name="tgl_lahir" id="" class="form-control border-primary text-purple @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggl Lahir">
                                         @error('tgl_lahir')
                                             <span class="invalid-feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Umur</label>
                                        <input wire:model="umur" type="text" name="umur" id="" class="form-control border-primary text-purple @error('umur') is-invalid @enderror" placeholder="Umur">
                                         @error('umur')
                                             <span class="invalid-feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Jenis Imunisasi</label>
                                        <select wire:model='jns_imunisasi' class="form-control border-primary text-purple @error('jns_imunisasi') is-invalid @enderror" name="jns_imunisasi">
                                            <option selected value="">Pilih Imunisasi</option>
                                            <option value="HBO">HBO</option>
                                            <option value="BCG dan Polio 1">BCG dan Polio 1</option>
                                            <option value="Pentabio 1 dan polio 2">Pentabio 1 dan polio 2</option>
                                            <option value="Pentabio 2 dan polio 3">Pentabio 2 dan polio 3</option>
                                            <option value="Pentabio 3 dan Polio 4">Pentabio 3 dan Polio 4</option>
                                            <option value="IPV">IPV</option>
                                            <option value="MR">MR</option>
                                            <option value="Booster Pentabio">Booster Pentabio</option>
                                            <option value="Booster MR">Booster MR</option>
                                            <option value="BCG">BCG</option>
                                            <option value="Pentabio 1">Pentabio 1</option>
                                            <option value="Pentabio 2">Pentabio 2</option>
                                            <option value="Pentabio 3">Pentabio 3</option>
                                            <option value="Polio 1">Polio 1</option>
                                            <option value="Polio 2">Polio 2</option>
                                            <option value="Polio 3">IPV</option>
                                            <option value="Polio 4">Polio 4</option>
                                          </select>
                                         @error('jns_imunisasi')
                                             <span class="invalid-feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">BB</label>
                                        <input wire:model="bb" type="text" name="bb" id="" class="form-control border-primary text-purple @error('bb') is-invalid @enderror" placeholder="BB">
                                         @error('bb')
                                             <span class="invalid-feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">PB</label>
                                        <input wire:model="pb" type="number" name="pb" id="" class="form-control border-primary text-purple @error('pb') is-invalid @enderror" placeholder="PB">
                                         @error('pb')
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
        <div wire:ignore.self class="modal fade" id="deleteimunisasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete data Imunisasi</h5>
                <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anada yakin ingin menghpus data Imunisasi {{ $nm_anak }}</p>
                </div>
                <div class="modal-footer">
                <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="deleteImunisasi({{$imunisasiId}})" type="button" class="btn btn-danger">Delete</button>
                <div wire:loading wire:target="deleteImunisasi">
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
        <div wire:ignore.self class="modal fade" id="updateimunisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mr-1" id="exampleModalLabel">Upate Data Kb</h5>
                        <div wire:loading wire:target="getImunisasi">
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
                            <div class="row">
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput2" class="text-purple">Nama Anak</label>
                                     <input wire:model="nm_anak" type="text" name="nm_anak" id="" class="form-control border-primary text-purple @error('nm_anak') is-invalid @enderror" placeholder="Nama Anak">
                                      @error('nm_anak')
                                          <span class="invalid-feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Tanggl Lahir</label>
                                     <input wire:model="tgl_lahir" type="date" name="tgl_lahir" id="" class="form-control border-primary text-purple @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggl Lahir">
                                      @error('tgl_lahir')
                                          <span class="invalid-feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Umur</label>
                                     <input wire:model="umur" type="text" name="umur" id="" class="form-control border-primary text-purple @error('umur') is-invalid @enderror" placeholder="Umur">
                                      @error('umur')
                                          <span class="invalid-feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                             </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Jenis Imunisasi</label>
                                     <select wire:model='jns_imunisasi' class="form-control border-primary text-purple @error('jns_imunisasi') is-invalid @enderror" name="jns_imunisasi">
                                         <option value="HBO">HBO</option>
                                         <option value="BCG dan Polio 1">BCG dan Polio 1</option>
                                         <option value="Pentabio 1 dan polio 2">Pentabio 1 dan polio 2</option>
                                         <option value="Pentabio 2 dan polio 3">Pentabio 2 dan polio 3</option>
                                         <option value="Pentabio 3 dan Polio 4">Pentabio 3 dan Polio 4</option>
                                         <option value="IPV">IPV</option>
                                         <option value="MR">MR</option>
                                         <option value="Booster Pentabio">Booster Pentabio</option>
                                         <option value="Booster MR">Booster MR</option>
                                         <option value="BCG">BCG</option>
                                         <option value="Pentabio 1">Pentabio 1</option>
                                         <option value="Pentabio 2">Pentabio 2</option>
                                         <option value="Pentabio 3">Pentabio 3</option>
                                         <option value="Polio 1">Polio 1</option>
                                         <option value="Polio 2">Polio 2</option>
                                         <option value="Polio 3">IPV</option>
                                         <option value="Polio 4">Polio 4</option>
                                       </select>
                                      @error('jns_imunisasi')
                                          <span class="invalid-feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">BB</label>
                                     <input wire:model="bb" type="text" name="bb" id="" class="form-control border-primary text-purple @error('bb') is-invalid @enderror" placeholder="BB">
                                      @error('bb')
                                          <span class="invalid-feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">PB</label>
                                     <input wire:model="pb" type="number" name="pb" id="" class="form-control border-primary text-purple @error('pb') is-invalid @enderror" placeholder="PB">
                                      @error('pb')
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
