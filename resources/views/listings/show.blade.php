<x-layout>

    @include('partials._search')
    <a href="/laragigs/public" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back </a>
    <div class="mx-4">
        <x-card class='p-10'>
            <div class="flex flex-col items-center justify-center text-center py-4"
                 style="background-color: #6f811899">
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/'.$listing->logo): asset('images/no-image2.png') }}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                {{-- tags url component--}}
                <x-listing-tags :tagsCsv="$listing->tags"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6 w-2/3 m-auto">
                        <p>
                            {{$listing->description}}
                        </p>

                        <a
                            href="mailto:{{$listing->email}}"
                            class="block bg-lime-700 w-1/3 m-auto text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>Contact Employer</a>

                        <a
                            href="{{$listing->website}}"
                            target="_blank"
                            class="block bg-black w-1/3 m-auto text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit Website</a>
                    </div>
                </div>
            </div>
        </x-card>

        {{-- Show edit and delete listing button --}}
        {{--<x-card class="mt-4 p-2 flex space-x-6">
            <a href="/laragigs/public/listings/{{$listing->id}}/edit"
               class="block w-full bg-blue-500 m-auto text-white mt-6 py-2 rounded-xl hover:opacity-80 text-center">
                <i class="fa-solid fa-pencil"></i> Edit job
            </a>

            <div
                class="block w-full bg-red-500 m-auto text-white mt-6 py-2 rounded-xl hover:opacity-80 text-center">
                <form method="POST" action="/laragigs/public/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button>
                        <i class="fa-solid fa-trash"></i> Delete Job
                    </button>
                </form>
            </div>

        </x-card>--}}

    </div>

</x-layout>
