<div class="card ">
    {{-- Header --}}
    <div class="card-header">
        <img src="{{$post->owner->image}}" class="w-9 h-9 mr-3 rounded-full "/>
        <a href="/{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
    </div>

    {{-- Body --}}
    <div class="card-body">
        <div class="max-h-[35rem] overflow-hidden">
            {{-- {{asset("storage/".$post->image)}} --}}
            <img src="{{  $post->image}}" class="h-auto w-full object-cover" alt=" {{ $post->description }}">
        </div>
        {{-- likes --}}
        <div class="p-3">
            <a href="/p/{{$post->slug}}/like">
                @if ($post->liked(auth()->user()))                    
                <i class="bx bxs-heart text-red-600 text-3xl hover:text-gray-400 cursor-pointer mr-3"></i>
                @else
                <i class="bx bx-heart text-3xl hover:text-gray-400 cursor-pointer mr-3"></i>
                @endif

            </a>
        </div>
        {{-- end likes --}}

        <div class="p-3">
            <a href="/{{$post->owner->username}}" class="font-bold mr-1">{{$post->owner->username}}</a>
            {{$post->description}}
        </div>
        @if ($post->comments()->count() > 0)
            <a href="/p/{{$post->slug}}" class="p-3 font-bold text-sm text-gray-500">
                {{__('View all ' . $post->comments()->count() . ' comments')}}
            </a>
        @endif
        <div class="p-3 text-gray-400 uppercase text-xs">
            {{$post->created_at->diffForHumans()}}
        </div>
    </div>

    {{-- Footer --}}

    <div class="card-footer">
        <form action="/p/{{$post->slug}}/comment" method="post">
            @csrf
            <div class="flex flex-row">
                <textarea name="body" placeholder="{{ __('Add a comment...') }}" autocomplete="off" autocorrect="off" class="grow border-none resize-none focus:ring-0 outline-0 bg-none max-h-60 h-5 p-0 overflow-y-hidden placeholder-gray-400"></textarea>
                <button type="submit" class="bg-white border-none  text-blue-500 ">{{__('COMMENT')}}</button>
            </div>
        </form>
    </div>
</div>