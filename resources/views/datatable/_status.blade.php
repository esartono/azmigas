@if ( $status == false )
    <span class="badge badge-success"> {{ $label[0] }} </span>
@else    
    <span class="badge badge-danger"> {{ $label[1] }} </span>
@endif