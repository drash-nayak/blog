<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 truncate ... pr-9 text-sm font-semibold w-full lg:w-72 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-icon style="right: 12px;" name="down-arrow" class="absolute pointer-events-none"></x-icon>
        </button>
    </x-slot>
    <x-dropdown-item
        :active="request()->routeIs('home')"
        href="/">
        All
    </x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
            :active='request()->is("categories/{$category->slug}")'
            href="/?category={{$category->slug}}&{{http_build_query(request()->except('category','page'))}}">
            {{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
