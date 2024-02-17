@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Product maintenance tips</h1>

        </div>
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />

    <div class="row mb-2">
        <div class="col">
            <span id="add-toggle" class="text-primary h6 cursor-pointer toggle-i">
                <span><strong>Add maintenance tip</strong></span>
                <i class="fa-solid fa-angle-down fa-xl rotate"></i>
            </span>
        </div>
    </div>

    <div id="add-form-row" class="row justify-content-center border rounded mb-4">
        <div class="col-md-8 py-3">
            <form action="{{ route('maintenances.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="title . . ." value="{{ old('title') }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="tip">Maintenance Tip</label>
                    <textarea class="form-control" name="tip" id="tip" rows="4" placeholder="type here ..">{{ old('tip') }}</textarea>
                    @error('tip')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="accordion accordion-flush" id="accordionExample">
                @foreach($maintenances as $key => $maintenance)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$key}}">
                        <button class="accordion-button {{$key == 0 ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="{{$key == 0 ? 'true' : 'false'}}" aria-controls="collapse{{$key}}">
                            <strong>{{$maintenance->title}}</strong>
                        </button>
                    </h2>
                    <div id="collapse{{$key}}" class="accordion-collapse collapse {{$key == 0 ? 'show' : ''}}" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{$maintenance->maintenance_tip}}
                            <div class="mt-3">
                                <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('maintenances.destroy', $maintenance->id) }}" method="POST" class="d-inline mx-1">
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