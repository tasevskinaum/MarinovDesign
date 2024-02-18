@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Admins</h1>

        </div>
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />

    <div class="row mb-3">
        <div class="col">
            <span id="add-toggle" class="text-primary h6 cursor-pointer toggle-i">
                <span><strong>Create new Admin</strong></span>
                <i class="fa-solid fa-angle-down fa-xl rotate"></i>
            </span>
        </div>
    </div>

    <div id="add-form-row" class="row justify-content-center border rounded mb-4">
        <div class="col p-5">
            <form action="{{ route('admins.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    $("#add-toggle").click(function() {
        $("#add-form-row")
            .slideToggle();
        $(".fa-angle-down").toggleClass('rotate');
        $("#add-form-row").css("display", "flex");
    })
</script>
@endsection