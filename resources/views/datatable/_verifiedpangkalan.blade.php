@if ( $status == false )
    @if (auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('pangkalan.verifikasi', ['id'=>$id, 'user_id'=>$user_id]) }}" class='btn btn-sm btn-rounded btn-danger'> Belum </a>
    @else
        <span class="badge badge-danger">Belum</span>
    @endif
@else    
    <span class="badge badge-success"> Sudah </span>
@endif