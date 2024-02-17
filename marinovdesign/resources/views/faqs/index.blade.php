<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faq Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="..." crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>

</head>

<body>
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
                        <button class="accordion-button btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </h2>

                    <div class="btn-group" role="group">
                        <a href="{{ route('faqs.show', $faq->id) }}" class="btn btn-info">Show</a>

                        <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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
</body>


</html>