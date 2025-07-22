
<a href ="{{ route('admin.documents.download',$row->id) }}" class="btn btn-info me-2" title="{{ __('system.preview') }}"> <i class="fa fa-download" aria-hidden="true"></i></a>

@can('role-delete')
    <form method="POST" action="{{ route('admin.documents.destroy', $row->id) }}" style="display:inline" >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" title="{{ __('system.delete') }}"><i class="fa fa-trash"></i></button>
    </form>
@endcan
