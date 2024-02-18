@extends('dashboard.master')

@section('content')
<div class="container-fluid">
    <h2>Create new Product</h2>

    <div class="row justify-content-center">
        <div class="col">

            <form id="add_product_form" action="{{ route('products.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="weight" class="form-label">Weight</label>
                    <div class="input-group">
                        <input type="string" class="form-control" id="weight" name="weight" placeholder="Weight" value="{{ old('weight') }}">
                        <div class="input-group-text">kg</div>
                    </div>
                    @error('weight')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="dimension" class="form-label">Dimension</label>
                    <div class="input-group">
                        <input type="string" class="form-control" id="dimension" name="dimension" placeholder="Dimension" value="{{ old('dimension') }}">
                        <div class="input-group-text">cm</div>
                    </div>
                    @error('dimension')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-select">
                        <option value="" disabled {{ old('category') == '' ? 'selected' : '' }}>Choose category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->display_name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" name="type" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group">
                        <input type="string" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
                        <div class="input-group-text">€</div>
                    </div>
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="discount" class="form-label">Discount</label>
                    <div class="input-group">
                        <input type="string" class="form-control" id="discount" name="discount" placeholder="Discount" value="{{ old('discount') }}">
                        <div class="input-group-text">%</div>
                    </div>
                    @error('discount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="in_stock" class="form-label">In stock</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="in_stock" name="in_stock" value="{{ old('in_stock') }}">
                        <div class="input-group-text">pieces</div>
                    </div>
                    @error('in_stock')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="materials" class="form-label">Materials</label>
                    <select name="materials[]" id="materials" multiple class="form-control">
                        @foreach($materials as $material)
                        <option value="{{ $material->id }}">{{ $material->display_name }}</option>
                        @endforeach
                    </select>
                    @error('materials')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="maintenances" class="form-label">Maintenance tip</label>
                    <select name="maintenances[]" id="maintenances" multiple class="form-control">
                        @foreach($maintenances as $maintenance)
                        <option value="{{ $maintenance->id }}">{{ $maintenance->title }}</option>
                        @endforeach
                    </select>
                    @error('maintenances')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="images" class="form-label">Select images..</label>
                    <input type="file" name="images[]" id="images" multiple class="form-control">
                    @error('images')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

            <div class="mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Go back</a>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {
        new MultiSelectTag('materials');
        new MultiSelectTag('maintenances');
    });
</script>

<script>
    $(document).ready(function() {
        $("#images").fileinput({
            theme: 'fas',
            showUpload: false, // Hide the upload button
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                axios.get(`/api/get-types/${category_id}`)
                    .then(function(response) {
                        const types = response.data;
                        $("#type").empty();
                        $.each(types, function(key, value) {
                            $("#type").append('<option value="' + value.id + '">' + value.display_name + '</option>');
                        });
                    })
                    .catch(function(error) {
                        console.error('Error fetching types:', error);
                    });
            } else {
                $("#type").empty();
            }
        });
    });
</script>

@endsection