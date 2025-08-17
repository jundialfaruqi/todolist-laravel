@props(['type' => 'info', 'message'])

@php
    $classes = [
        'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        'success' => 'bg-green-50 border-green-200 text-green-800',
        'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
        'error' => 'bg-red-50 border-red-200 text-red-800',
    ];
@endphp

<div class="rounded-md border p-4 {{ $classes[$type] ?? $classes['info'] }}">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm font-medium">
                {{ $message }}
            </p>
        </div>
    </div>
</div>
