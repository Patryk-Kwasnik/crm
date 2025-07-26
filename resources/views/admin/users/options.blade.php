<a href =" {{ route('admin.users.show', $row->id) }}" title="{{ __('system.preview') }}" class= "btn btn-secondary"> <i class="fa fa-eye"></i></a>
<a href =" {{ route('admin.users.edit', $row->id) }}" title=" {{ __('system.edit') }}" class= "btn btn-secondary" ><i class="fa fa-pencil"></i></a>
<form method="POST" action="{{ route('admin.users.destroy', $row->id) }}" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-dark delete" title="{{ __('system.delete') }}"><i class="fa fa-trash"></i></button>
</form>
