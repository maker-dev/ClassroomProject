@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'small text-success email-received text-start mb-2']) }}>
        {{ $status }}
    </div>
@endif
