
<a href ="{{ route('admin.news.show',$row->id) }}" class="btn btn-secondary" title="{{ __('system.preview') }}"> <i class="fa fa-eye"></i></a>
@can('role-edit')
    <a href =" {{ route('admin.news.edit',$row->id) }}" class="btn btn-secondary" title="{{ __('system.edit') }}"><i class="fa fa-pencil"></i></a>
@endcan
@can('role-delete')
    <form method="POST" action="{{ route('admin.news.destroy', $row->id) }}" style="display:inline" >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-dark delete" title="{{ __('system.delete') }}"><i class="fa fa-trash"></i></button>
    </form>
@endcan
