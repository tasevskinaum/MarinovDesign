@extends('dashboard.master');

@section('content')
<div class="container mt-5">
    <h2>FAQ Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $faq->question }}</h5>
            <p class="card-text">{{ $faq->answer }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Back to FAQs</a>
    </div>
</div>
@endsection