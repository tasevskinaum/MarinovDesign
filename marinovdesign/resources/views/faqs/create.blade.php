@extends('dashboard.master');

@section('content')
<div class="container mt-5">
    <h2>Create FAQ</h2>

    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create FAQ</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Back to FAQs</a>
    </div>
</div>
@endsection