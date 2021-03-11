<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama',@$data->nama) }}" required>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('nama') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="">Akses Menu</label>
    <div class="table-responsive">
        <table class="table" id="table">

            <thead>
    
                <tr>
    
                    <th colspan="10">Akses</th>
    
                </tr>
    
            </thead>
    
            <tbody>
                <?php $no_plh=1; ?>
            <tr>
                <td colspan="11" align="left"><input type="checkbox" id="{{ $no_plh }}"></td>
            </tr>
            <tr>
    
                <?php 
                    $nama = "";
                   
                    
                    foreach ($akses as $m): 
                        $no_plh++;
                        
                        if($nama != $m->nama):
                        ?>
                        <tr>
                          <td align="left"><input class="sel pilih" nomornya="{{ $no_plh }}" type="checkbox" ></td>
                        <?php
                        $col = 11;
                        foreach ($akses as $d): 
                            if($m->nama == $d->nama  ){
                                
                                $col--;
                                ?>
                                <td  ><input  class="sel s{{ $no_plh }}" id="akses-{{ $d->id }}" @if (isset($group_akses) && in_array($d->id,$group_akses))
                                    checked="true"
                                @endif  type="checkbox" name="akses[]" value="{{ $d->id }}"> <label for="akses-{{ $d->id }}">{{ $d->aksi }} {{ $d->nama }}</label> </td>
    
                                <?php
                            }
                        endforeach;
                        ?>
                            
                        </tr>
                        <?php
                        
                        endif;
                        $nama = $m->nama;
                    endforeach; 
                ?>
    
                    
    
                </tr>
    
            </tbody>
    
        </table>
    </div>
</div>

{{-- <div class="form-group">
    <label for="">Pilih OPD</label>
    <div class="row">
        <div class="col-md-12">
            <input type="checkbox" id="opd-semua"> <label for="opd-semua"><strong>Pilih Semua</strong></label>
        </div>
    </div>
    <div class="row">
        @foreach ($opds as $opd)
            <div class="col-md-3">
                <input type="checkbox" name="opd_id[]" @if (isset($group_opd) && in_array($opd->id,$group_opd))
                checked="true"
            @endif value="{{ $opd->id }}" id="opd-{{ $opd->id }}" class="pilih-opd"> <label for="opd-{{ $opd->id }}">{{ $opd->nama }}</label>
            </div>
        @endforeach
    </div>
</div> --}}

@push('scripts')
    <script type="text/javascript">
        jQuery("#1").click(function () {
            jQuery('.sel').not(this).prop('checked', this.checked);
        });
        jQuery(".pilih").click(function () {
            jQuery(".s"+jQuery(this).attr('nomornya')).not(this).prop('checked', this.checked);
        });

        jQuery("#opd-semua").click(function () {
            jQuery('.pilih-opd').not(this).prop('checked', this.checked);
        });
    </script>
@endpush