<x-dropdown>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm w-32 text-left inline-flex">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category)

    <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
        :active='request()->is("categories/{$category->slug}")'>
        {{ ucwords($category->name) }}
    </x-dropdown-item>

    @endforeach

</x-dropdown>