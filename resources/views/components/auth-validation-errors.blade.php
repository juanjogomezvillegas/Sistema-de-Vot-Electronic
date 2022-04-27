@props(['errors'])

@if ($errors->any())
    <article class="message is-small is-danger">
        <div class="message-body">
            <div {{ $attributes }}>
                <p class="has-text-weight-bold">{{ __('Whoops! Something went wrong.') }}</p>
            </div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </article>
@endif
