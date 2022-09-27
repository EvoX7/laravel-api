{{-- Name --}}
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name) }}"
        required>
    @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Color --}}
<div class="mb-3">
    <label for="color" class="form-label">Select category color</label>
    <input type="color" class="form-control form-control-color" name="color" id="color">
    @error('color')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
