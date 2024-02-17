@extends('dashboard.master');

@section('content')
<div class="container mt-5">
    <h2>Edit FAQ</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="4" required>{{ $faq->answer }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update FAQ</button>
    </form>
    <div class="mt-3">
        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Back to FAQs</a>
    </div>
</div>
@endsection