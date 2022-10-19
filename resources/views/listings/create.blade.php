<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a New Job
            </h2>
            <p class="mb-4 font-bold">Post a job to find a people who need job</p>
        </header>

        {{-- Create Job Listing Form  -------------------------------------------------------------------}}
        <form method="POST" action="/laragigs/public/listings" enctype="multipart/form-data">
            @csrf {{-- *******it prevents cross side scripting attacks*******  --}}
            {{-- Company -----------------------------------------------}}
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2">Company Name</label>
                <input
                    value="{{old('company')}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                />

                {{--Error handling--}}
                @error('company') {{--we should give name of the input--}}
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Title -----------------------------------------------}}
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input
                    value="{{old('title')}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                />
                {{--Error handling--}}
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Location -----------------------------------------------}}
            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2">Job Location</label>
                <input
                    value="{{old('location')}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                />

                {{--Error handling--}}
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Email -----------------------------------------------}}
            <div class="mb-6">

                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input
                    value="{{old('email')}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                />

                {{--Error handling--}}
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Website -----------------------------------------------}}
            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2">Website/Application URL</label>
                <input
                    value="{{old('website')}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                />

                {{--Error handling--}}
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Tags -----------------------------------------------}}
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)</label>
                <input
                    value="{{old('tags')}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                />

                {{--Error handling--}}
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Logo -----------------------------------------------}}
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo</label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />

                {{--Error handling--}}
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Description -----------------------------------------------}}
            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2">
                    Job Description</label>
                <textarea
                    id="description"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{old('description')}}</textarea>

                {{--Error handling--}}
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            {{-- Submit Button -----------------------------------------------}}
            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-lime-800 text-white rounded py-2 px-4 hover:bg-black">
                    Create Gig
                </button>

                {{-- Back Button --}}
                <a href="/laragigs/public" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>

</x-layout>
