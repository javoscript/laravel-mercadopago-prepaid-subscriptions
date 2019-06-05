@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route(config('prepaid-subs.route_prefix').'.payment.create', $account) }}" method="post" class="form">
    @csrf

    <div class="form-group">
        <label>Nombre: <span class="text-danger">*</span></label>
        <input type="text" name="prepaid_subs__first_name" id="prepaid_subs__first_name" value="{{old('prepaid_subs__first_name')}}" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Apellido: <span class="text-danger">*</span></label>
        <input type="text" name="prepaid_subs__last_name" id="prepaid_subs__last_name" value="{{old('prepaid_subs__last_name')}}" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Email: <span class="text-danger">*</span></label>
        <input type="email" name="prepaid_subs__email" id="prepaid_subs__email" value="{{old('prepaid_subs__email')}}" class="form-control" required/>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Planes
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($prepaid_subs__plans as $plan)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="prepaid_subs__plan_id" value="{{ $plan->getId() }}" {{(old('prepaid_subs__plan_id')==$plan->getId())?'checked':''}} required>
                                        {{ $plan->getName() }}
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($plan->getDetails() as $detail)
                                        <li class="list-group-item">{{ $detail }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer text-center text-white bg-primary border-primary">
                                @if ($plan->getOldPrice())
                                <small><del>${{ $plan->getOldPrice() }}</del></small><br>
                                @endif

                                ${{ $plan->getPrice() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-group mt-4 text-center">
        <button type="submit" class="btn btn-primary">Comprar</button>
    </div>
</form>


@foreach ($prepaid_subs__plans as $plan)

@endforeach
