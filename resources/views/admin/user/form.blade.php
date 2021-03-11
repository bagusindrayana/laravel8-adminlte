<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama',@$data->nama) }}" required>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('nama') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ old('email',@$data->email) }}" required>
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

@if (!isset($data))
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
@endif

<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
    <label for="group_id" class="form-label">Group</label>
    <select name="group_id" id="group_id" class="form-control">
        @foreach ($groups as $key => $item)
            <option value="{{ $key }}" @if(old('group_id',@$data->group_id) == $key) selected @endif>{{ $item }}</option>
        @endforeach
    </select>
    @if ($errors->has('group_id'))
        <span class="help-block">
            <strong>{{ $errors->first('group_id') }}</strong>
        </span>
    @endif
</div>



<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" style="height: auto !important;min-height:50px !important;">{{ old('alamat',@$data->alamat) }}</textarea>
    @if ($errors->has('alamat'))
        <span class="help-block">
            <strong>{{ $errors->first('alamat') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
    <label for="pekerjaan" class="form-label">Pekerjaan</label>
    <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{{ old('pekerjaan',@$data->pekerjaan) }}" >
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('pekerjaan') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input type="text" id="jabatan" name="jabatan" class="form-control" value="{{ old('jabatan',@$data->jabatan) }}" >
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('jabatan') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
    <label for="no_hp" class="form-label">No HP</label>
    <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp',@$data->no_hp) }}" >
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('no_hp') }}</strong>
        </span>
    @endif
</div>