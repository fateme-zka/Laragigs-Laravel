<x-layout>

    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($listings)==0)
        <!-- php foreach loop starts: -->
        @foreach ($listings as $listing)
            <!-- open listing-card.blade.php component -->
                <x-listing-card :listing="$listing"/>

        @endforeach
        <!-- php foreach loop ends -->
        @else
            <span class="text-3xl font-bold mb-4">---The list is empty---</span>
        @endunless
    </div>

    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>

</x-layout>
