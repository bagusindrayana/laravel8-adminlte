<div class="btn-group" role="group" aria-label="Action Button">
    <a type="button" class="btn btn-sm btn-warning" href="{{ route('admin.user.edit',$data->id) }}" ><i class="fa fa-edit"></i> Edit</a>
    @if (Auth::user()->id != $data->id)
        <form action="{{ route('admin.user.destroy',$data->id) }}" method="POST" class="delete-data">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> Hapus</button>
        </form>
    @endif
</div>