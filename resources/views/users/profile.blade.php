<x-app-layout>
    <div class="{{session('success') ? '' : 'hidden'}} w-50 p-4 text-sm text-green-700 bg-green-100 rounded-lg absolute right-10 shadow shadow-neutral-200" role="alert">
        <span class="font-medium">{{session('success')}}</span>
    </div>
    <div class="grid grid-cols-4 mt-5">
        {{-- User Image --}}
        <div class="px-4 col-span-1 order-1">
            <img src="{{$user->image}}" alt="{{$user->username}} profile picture" 
            class="rounded-full w-20 md:w-40 border border-neutral-300">
        </div>

        {{-- UserName and Buttons --}}
        <div class="px-4 col-span-2 md:ml-0 flex flex-col order-2 md:col-span-3">
            <div class="text-3xl mb-3">{{$user->username}}</div>
            @auth
                
            @if ($user->id == auth()->id())
            <a href="/{{$user->username}}/edit" class="w-44 border text-sm font-bold py-1 rounded-md border-neutral-300 text-center">
                {{__('Edit Profile')}}
            </a>
            @else
            <livewire:follow-button :userId="$user->id" classes="bg-blue-500 text-white" />
            @endif
           
            @endauth
        </div>

        {{-- User Info --}}
        <div class="text-md mt-8 px-4 col-span-3 col-start-1 order-3 md:col-start-2 md:order-4 md:mt-0">
            <p class="font-bold">{{$user->name}}</p>
            {!! nl2br(e($user->bio))!!}
        </div>

        {{-- User Status --}}
        <div
        class="col-span-4 my-5 py-2 border-y border-y-neutral-200 order-4 md:order-3 md:border-none md:px-4 md:col-start-2">
            <ul class="text-md flex flex-row justify-around md:justify-start md:space-x-10 md:text-xl">
                <li class="flex flex-col md:flex-row text-center rtl:ml-5">
                    <div class="md:ltr:mr-1 md:rtl:ml-1 font-bold md:font-normal">
                        {{$user->posts()->count()}}
                    </div>
                    <span class='text-neutral-500 md:text-black ml-2'>{{$user->posts()->count() > 1 ? 'posts' : 'post'}}</span>
                </li>
                
                @livewire('follower', ['userId' => $user->id], key($user->id))
              
                @livewire('following', ['userId' => $user->id], key($user->id))
            </ul>
        </div>
    </div>

    {{-- Posts --}}
    @if ($user->posts()->count() > 0 and ($user->private_account == false or auth()->id() == $user->id or auth()->user()->is_following($user)))
        <div class="grid grid-cols-3 gap-4 my-5">
             @foreach ($user->posts as $post)
                <a class="aspect-square block w-full" href="/p/{{ $post->slug }}">
                    <img class="w-full aspect-square object-cover" src="/storage/{{ $post->image }}">
                </a>
             @endforeach
        </div>
    @else
    <div class="w-full text-center mt-20">
        @if ($user->private_account == true and $user->id != auth()->id())
            {{__('This Account Is a Private . Follow To Show The Posts')}}
        @else
        {{__('This Account Is Not Have Any Posts')}}
        @endif
    </div>
     @endif

</x-app-layout>
