<div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        {{$slot}}
        @isset($icon)
            {{ $icon }}
        @endisset
    </div>
    <input
        {{ $attributes }} class="pl-10 pr-4 py-2 w-full border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        placeholder="{{ $placeholder }}">
</div>
