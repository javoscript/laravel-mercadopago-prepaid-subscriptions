<div class="card">
    <div class="card-header text-white bg-primary">
        Pagos
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th><th>Fecha</th><th>Cliente</th><th>Email</th><th>Estado</th><th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($account->payments as $payment)
                <tr>
                    <td>{{$payment->id}}</td>
                    <td>{{$payment->updated_at}}</td>
                    <td>{{$payment->client}}</td>
                    <td>{{$payment->email}}</td>
                    <td>{!! $payment->status_badge !!}</td>
                    <td>
                        Plan: "{{$payment->plan->name}}"<br>
                        Precio: ${{$payment->plan->price}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
