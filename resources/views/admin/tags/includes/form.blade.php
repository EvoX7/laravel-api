{{-- Name --}}
<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $tag->name) }}" required>
    @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
