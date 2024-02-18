@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Custom orders</h1>

        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="accordion accordion-flush" id="accordionExample">
                @foreach($custom_orders as $key => $order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$key}}">
                        <button class="accordion-button {{$key == 0 ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="{{$key == 0 ? 'true' : 'false'}}" aria-controls="collapse{{$key}}">
                            <strong>Order #{{ $order->id }}</strong>
                        </button>
                    </h2>
                    <div id="collapse{{$key}}" class="accordion-collapse collapse {{$key == 0 ? 'show' : ''}}" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div>
                                From: {{ $order->name ?? 'N/A' }}
                            </div>
                            <div class="mb-3">
                                Email: {{ $order->email }}
                            </div>
                            <div>
                                Message: <span class="d-block">{{ $order->message ?? 'N/A' }}</span>
                            </div>
                            <div>
                                Image:
                                @if(isset($order->image))
                                <a href="{{ $order->image }}" target="_blank">{{ $order->image }}</a>
                                @else
                                <span class="text-primary">N/A</span>
                                @endif
                            </div>
                            <div>
                                Link:
                                @if(isset($order->link))
                                <a href="{{ $order->link }}" target="_blank">{{ $order->link }}</a>
                                @else
                                <span class="text-primary">N/A</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection