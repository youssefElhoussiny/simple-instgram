<div>
    <ul>
        @forelse (auth()->user()->pending_followers() as $pending)
        <li class="flex flex-row w-full p-3 items-center text-sm">
            <div>
                <img src="{{$pending->image}}" alt="{{$pending->username}}" class="w-10 h-10 mr-2 rounded-full ">
            </div>
            <div class="flex flex-col grow">
                <div class="font-bold">
                    <a href="/{{$pending->username}}">{{$pending->username}}</a>
                </div>
                <div class="text-sm text-neutral-500">
                    {{$pending->name}}
                </div>
            </div>
           <button class="border border-blue-500 bg-blue-500 text-white px-2 py-1 rounded mr-2" wire:click="confirm({{$pending->id}})"> 
            {{__('confirm')}}
           </button>
           <button class="border border-gray-500  px-2 py-1 rounded" wire:click="delete({{$pending->id}})"> 
            {{__('Delete')}}
           </button>
        </li>
    @empty
        <li class="w-full p-3 text-center">
            {{__('No pending followers yet.')}}
        </li>
    @endforelse
</ul>
</div>
