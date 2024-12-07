<a {{ $attributes->merge(['class' => 'hover:text-white px-3 py-2 rounded-md text-sm font-medium '. ($active ? 'bg-gray-900 text-white' : 'text-gray-400')])  }}>{{ $slot }}</a>
