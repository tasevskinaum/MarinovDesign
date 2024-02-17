@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <h2>Create FAQ</h2>


    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <input type="text" class="form-control" id="question" name="question" value="{{ old('question', $faq->question) }}">
                    @error('question')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4">{{ old('answer', $faq->answer) }}</textarea>
                    @error('answer')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update FAQ</button>
            </form>

            <div class="mt-3">
                <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Back to FAQs</a>
            </div>
        </div>
    </div>


</div>
@endsection