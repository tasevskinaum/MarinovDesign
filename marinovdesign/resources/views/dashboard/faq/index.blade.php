@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row my-3">
        <div class="col">
            <h1 class="h3">FAQs</h1>
        </div>
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />

    <div class="row mb-2">
        <div class="col text-end">
            <a href="{{ route('faqs.create') }}" class="btn btn-primary">Create FAQ</a>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="accordion accordion-flush" id="accordionExample">
                @foreach($faqs as $key => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$key}}">
                        <button class="accordion-button {{$key == 0 ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="{{$key == 0 ? 'true' : 'false'}}" aria-controls="collapse{{$key}}">
                            <strong>{{$faq->question}}</strong>
                        </button>
                    </h2>
                    <div id="collapse{{$key}}" class="accordion-collapse collapse {{$key == 0 ? 'show' : ''}}" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{$faq->answer}}
                            <div class="mt-3">
                                <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="d-inline mx-1">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
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