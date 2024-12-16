<x-app-layout>
    <h2>{{ __('Create :resource', ['resource' => __('Image')]) }}</h2>

    <p class="my-3">{{ __('Before you can proceed, you need to select an image type.') }}</p>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3">
                <h2>{{ __('Remote Image') }}</h2>
                <p>{{ __('A "Remote Image" is an ISO/IMG file which is hosted on a different server.') }}</p>
                <a class="btn btn-outline-light" href="{{ route('images.create', ['type' => 'remote']) }}">{{ __('Select :type', ['type' => 'Remote Image']) }}</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3 disabled" data-bs-toggle="tooltip" data-bs-title="This function is currently not available.">
                <h2>{{ __('Local Image') }}</h2>
                <p>{{ __('A "Local Image" is an ISO/IMG file which is hosted on this server.') }}</p>
                <span class="text-danger">This function is currently not available.</span> <br>
                <a class="btn btn-outline-secondary disabled" href="{{ route('images.create', ['type' => 'local']) }}">{{ __('Select :type', ['type' => 'Local Image']) }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
