<!-- Search -->
<form action=""> {{-- it will be get request by default so we have not specify it! --}}
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="text"
            name="search" {{-- this name will show up in url after submit>> ?search=... --}}
            class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search Laravel Gigs..."
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-lime-700 hover:bg-lime-800"
            >
                Search
            </button>
        </div>
    </div>
</form>
