<x-app-layout>
    <h2>{{ __('Images') }}</h2>

    <a href="{{ route('images.create') }}" class="btn btn-success my-3">{{ __('Create :resource', ['resource' => __('Image')]) }}</a>

    <div>
        @if (request()->has('family'))
            <span class="badge rounded-pill text-bg-secondary" onclick="window.location.href = '{{ route('images.index') }}';" style="cursor: pointer">
                {{ request()->family }} &times;
            </span>
        @endif
    </div>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Type') }}</th>
                <th scope="col" style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#filterFamily">
                    {{ __('Family') }} <i class="bi bi-funnel ms-1 text-primary"></i>
                </th>
                <th scope="col">{{ __('Path') }}</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->name }}</td>
                    <td>{{ $image->type }}</td>
                    <td>{{ $image->family }}</td>
                    <td>
                        <a href="{{ $image->public_path }}" target="_blank">{{ $image->path }} <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('images.show', $image) }}">{{ __('Show') }}</a>
                        <a href="{{ route('images.edit', $image) }}">{{ __('Edit') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="filterFamily" aria-labelledby="filterFamilyLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="filterFamilyLabel">Families</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Select a filter for <code>family</code>.
            </div>
            <div class="mt-3">
                <ul class="">
                    @foreach($families as $family)
                        <li><a href="{{ route('images.index', ['family' => $family]) }}">{{ $family }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
