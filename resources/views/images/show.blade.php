<x-app-layout>
    <h2>{{ __('Image') }}: {{ $image->name }}</h2>

    <div>
        <a href="{{ route('images.index') }}" class="btn btn-outline-secondary my-3">
            {{ __('Back') }}
        </a>
        <a href="{{ route('images.edit', $image) }}" class="btn btn-outline-primary my-3">
            {{ __('Edit :resource', ['resource' => __('Image')]) }}
        </a>
        <button class="btn btn-outline-danger my-3" type="button" onclick="document.getElementById('delete-form').submit();">
            {{ __('Delete :resource', ['resource' => __('Image')]) }}
        </button>
    </div>

    <form action="{{ route('images.destroy', $image) }}" id="delete-form" method="post" class="d-none">
        @csrf
        @method('DELETE')
    </form>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <tbody>
            <tr>
                <th>{{ __('Family') }}</th>
                <td>{{ $image->family }} <a href="{{ route('images.index', ['family' => $image->family]) }}" class="ms-1"><i class="bi bi-funnel"></i></a></td>
            </tr>
            <tr>
                <th>{{ __('Type') }}</th>
                <td>{{ $image->type }}</td>
            </tr>
            <tr>
                <th>{{ __('Path') }}</th>
                <td><a href="{{ $image->public_path }}" target="_blank">{{ $image->path }} <i class="bi bi-box-arrow-up-right ms-1"></i></a></td>
            </tr>
            </tbody>
        </table>
    </div>

</x-app-layout>
