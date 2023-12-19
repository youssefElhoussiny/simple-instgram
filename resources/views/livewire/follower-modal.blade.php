<div class="max-h-96 flex flex-col">
    <div class="flex w-full items-center border-b border-b-neutral-100 p-2">
        <h1 class="text-lg font-bold text-center pb-2 grow">{{__('Followers')}}</h1>
        <button wire:click="$dispatch('closeModal')"><i class="bx bx-x text-xl"></i></button>
    </div>
    <ul class="overflow-y-auto">
        @forelse ($this->FollowerList as $follower)
            <li class="flex flex-row w-full p-3 items-center text-sm">
                <div>
                    <img src="{{$follower->image}}" alt="{{$follower->username}}" class="w-8 h-8 mr-2 rounded-full border border-neutral-300 ">
                </div>
                <div class="flex flex-col grow">
                    <div class="font-bold">
                        <a href="/{{$follower->username}}">{{$follower->username}}</a>
                    </div>
                    <div class="text-sm text-neutral-500">
                        {{$follower->name}}
                    </div>
                </div>
                <div>
                    <button class="border border-gray-500 px-2 py-1 rounded" wire:click="unfollow({{$follower->id}})">
                        {{__('Unfollow')}}
                    </button>
                </div>
            </li>
        @empty
            <li class="w-full p-3 text-center">
                {{__('There are not follower yet.')}}
            </li>
        @endforelse
    </ul>
</div>
