<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($listings) === 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <div class="text-center col-span-full mt-4 text-3xl font-semibold text-laravel">Not listings found</div>
        @endunless
    </div>

    <div class="mt-6 p-4 flex justify-end ">
        {{ $listings->links() }}
    </div>
</x-layout>
