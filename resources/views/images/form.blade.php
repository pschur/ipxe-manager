<x-app-layout>
    <h2>{{ $config->title }}</h2>

    <x-validation-errors class="mt-5" />

    <form action="{{ $config->action }}" method="post" class="mt-5">
        @csrf
        @method($config->method)

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $image->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="family" class="form-label">{{ __('Family') }}</label>
            <input type="text" class="form-control" id="family" name="family" value="{{ old('family', $image->family) }}">
        </div>

        @if($type === 'remote')
            <div class="mb-3">
                <label for="path" class="form-label">{{ __('Url') }} <span class="text-danger">*</span></label>
                <input type="url" class="form-control" id="path" name="path" value="{{ old('path', $image->path) }}" required>
            </div>
        @else
            <div class="mb-3">
                <label for="path" class="form-label">{{ __('ISO Image') }} <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="path" name="path" value="{{ old('path', $image->path) }}" required>
            </div>
        @endif

        <input type="hidden" name="type" value="{{ old('type', $type) }}">

        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

    </form>
</x-app-layout>
