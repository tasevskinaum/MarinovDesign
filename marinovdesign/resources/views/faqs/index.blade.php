@extends('dashboard.master');

@section('content')

<div class="container my-5">
    <h2>FAQs</h2>
    <div class="mb-3">
        <a href="{{ route('faqs.create') }}" class="btn btn-primary">Create FAQ</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="accordion" id="faqAccordion">
        @foreach ($faqs as $faq)
        <div class="accordion-item">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                        {{ $faq->question }}
                    </button>
                </h2>

                <div class="btn-group d-flex gap-2  " role="group">
                    <a href="{{ route('faqs.show', $faq->id) }}" class="btn btn-info btn-block">Show</a>
                    <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-secondary btn-block">Edit</a>
                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" ">
                        @csrf
                        @method('DELETE')
                        <button type=" submit" class="btn btn-danger btn-block  ">Delete</button>
                    </form>
                </div>
            </div>

            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection