@if ($errors->any())
    <div {{ $attributes->class('alert alert-danger')->merge(['role' => 'alert']) }}>
        <h4 class="alert-heading">{{ __('Whoops! Something went wrong.') }}</h4>

        <ul class="mt-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
