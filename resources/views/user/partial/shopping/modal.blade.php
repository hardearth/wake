<!-- Modal -->
<div class="modal fade" id="detail_bill_{{$bill->id}}" aria-labelledby="detail_bill_{{$bill->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail_bill_{{$bill->id}}Label">{{__('Detalle de compra')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>{{__('Curso')}}</th>
                        <th>{{__('Monto')}}</th>
                        <th>{{__('Cantidad')}}</th>
                        <th>{{__('Subtotal')}}</th>
                        <th>{{__('Precio Total')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (is_object($bill->courses))
                        @forelse($bill->courses as $bill_course)
                            <tr>
                                <td> {{$bill_course->title ?? 'Sin Información'}}</td>
                                <td>$ {{$bill_course->price ?? 0}}</td>
                                <td>$ {{$bill_course->quantity ?? 0}}</td>
                                <td>$ {{$bill_course->subtotal ?? 0}}</td>
                                <td>$ {{$bill_course->total_price ?? 0}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">{{__('Sin registros')}}</td>
                            </tr>
                        @endforelse
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cerrar')}}</button>
            </div>
        </div>
    </div>
</div>
