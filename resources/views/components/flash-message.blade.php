@if(session()->has('message'))

    {{--Alpinejs message disappearing after 3 seconds--}}
    <div x-data="{show: true}" x-init="setTimeout(() => show=false,3000)" x-show="show"
         role="alert" style="z-index: 900" class="p-6">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Message
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-orange-100 px-4 py-3 text-orange-700">
            <p>{{session('message')}}</p>
        </div>
    </div>

@endif
