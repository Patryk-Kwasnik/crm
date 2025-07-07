<a href =" {{ route('admin.products.show', $row->id) }}" title="{{ __('system.preview') }}" class= "btn btn-info"> <i class="fa fa-eye"></i></a>
<a href =" {{ route('admin.products.edit', $row->id) }}" title=" {{ __('system.edit') }}" class= "btn btn-dark" ><i class="fa fa-pencil"></i></a>
<form method="POST" action="{{ route('admin.products.destroy', $row->id) }}" style="display:inline">
    @csrf
    @method('DELETE')                         
    <button type="submit" class="btn btn-danger" title="{{ __('system.delete') }}"><i class="fa fa-trash"></i></button>
</form>