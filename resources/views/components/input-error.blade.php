@props(['messages'])

@if ($messages)
    <div class="input-error" {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </div>
@endif
