
<a href ="{{ route('admin.roles.show',$row->id) }}" class="btn btn-info" title="{{ __('system.preview') }}"> <i class="fa fa-eye"></i></a>
@can('role-edit')
    <a href =" {{ route('admin.roles.edit',$row->id) }}" class="btn btn-dark" title="{{ __('system.edit') }}"><i class="fa fa-pencil"></i></a>
@endcan
@can('role-delete')
    <form method="POST" action="{{ route('admin.roles.destroy', $row->id) }}" style="display:inline" >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" title="{{ __('system.delete') }}"><i class="fa fa-trash"></i></button>
    </form>
@endcan
