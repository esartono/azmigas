<div class="modal fade" id="addKonsumen" tabindex="-1" role="dialog" aria-labelledby="addKonsumenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKonsumenLabel">Medium Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'customers.store'], ['class' => 'form-horizontal']) !!}
                    {{ Form::hidden('transaksi', 'ok') }}
                    @include('customer._form')
                {!! Form::close() !!} 
            </div>
{{--             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div> --}}
        </div>
    </div>
</div>