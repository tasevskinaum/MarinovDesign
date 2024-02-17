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
</body>


</html>