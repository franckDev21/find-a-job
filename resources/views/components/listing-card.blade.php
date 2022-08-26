@props(['listing'])

<x-card>
    <div class="flex">
        <div class="hidden w-48 mr-6 md:block relative">
            <img class="absolute w-full h-auto object-cover" src="{{ $listing->logo ? Storage::url("$listing->logo") : asset('images/no-image.png') }}" alt="" />
        </div>
        <div>
            <h3 class="text-2xl">
                <a href="{{ route('listing.show', $listing) }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>

            <x-tags :tags="$listing->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
