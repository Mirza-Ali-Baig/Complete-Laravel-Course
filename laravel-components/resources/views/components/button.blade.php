<button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md ' . ($active ? 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500' : 'text-indigo-700 bg-indigo-100 hover:text-indigo-900 focus:ring-indigo-500')]) }}>
    {{ $text }}
</button>
