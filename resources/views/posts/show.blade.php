<x-app-layout>
    <div class="h-screen md:flex md:flex-row flex">
        {{-- Left Side --}}
        <div class="flex h-full items-center overflow-hidden bg-black md:w-7/12">
            <img src="/{{$post->image}}" class="h-auto w-full">
        </div>
        {{-- End Left Side --}}
        {{-- Right Side --}}
        <div class="flex w-full flex-col bg-white md:w-5/12">
            {{-- Top --}}
            <div class="border-b-2">
                <div class="flex items-center p-5">
                    <img src="{{$post->owner->image}}" alt="" class="mr-5 h-10 rounded-full">
                    <div class="grow">
                        <a href="/{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
                    </div>
                    @can('update' , $post)
                        
                    <a href="/p/{{$post->slug}}/edit"><i class="bx bx-message-square-edit"></i></a>
                    
                    <form action="/p/{{$post->slug}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">
                            <i class="bx bx-message-square ml-2 text-xl text-red-600"></i>
                        </button>
                    </form>
                    @endcan
                    @cannot('update' , $post)
                   {{-- <livewire:follow :post="$post" :userId="$post->owner->id"/> --}}
                    <livewire:follow-button :userId="$post->owner->id" classes="text-blue-500"/>
                    @endcannot

                </div>
            </div>
            {{-- End Top --}}
            {{-- Middel --}}
                {{-- Middle --}}
                <div class="flex flex-col grow overflow-y-auto">
                    <div class="flex items-center p-5">
                        <img src="{{ $post->owner->image }}" class="mr-5  h-10 w-10 rounded-full">
                        <div>
                            <a href="{{ $post->owner->username }}" class="font-bold bold">{{ $post->owner->username }}</a>
                            {{ $post->description }}
                        </div>
                    </div>
            {{-- End Middel --}}
            {{-- Comment --}}
            <div class="grow">
                @foreach ($post->comments as $comment)
                    <div class="flex items-start px-5 py-2">
                        <img src="{{ $comment->owner->image }}" alt="" class="mr-5  h-10 w-10 rounded-full">
                        <div class="flex flex-col">
                            <div>
                                <a href="/{{ $comment->owner->username }}" class="font-bold">{{ $comment->owner->username }}</a>
                                {{ $comment->body }}
                            </div>
                            <div class="mt-1 text-sm font-bold text-gray-400">
                                {{ $comment->created_at->diffForHumans(null, true, true) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Like && Comment --}}
            <div class="p-3 flex flex-row border-t">
                <livewire:like :post="$post" />
                <a class="grow" onclick="document.getElmentById('comment_body').focus()">
                    <i class="bx bx-comment text-3xl hover:text-gray-400 cursor-pointer mr-3"></i>
                </a>
                <livewire:likedby :post="$post"/>
            </div>
            {{--End  Like && Comment --}}

            <div class="border-t-2 p-5"> 
                 @error('body')
                <div class="text-red-700">{{$message}}</div>  
                @enderror
                <form action="/p/{{ $post->slug }}/comment" method="POST">
                @csrf
                <div class="flex flex-row">
        <textarea name="body" id="comment_body" placeholder="{{ __('Add a comment...') }}"
                  class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0"></textarea>
                    <button type="submit"
                            class="ltr:ml-5 rtl:mr-5 border-none bg-white text-blue-500">{{ __('Post') }}</button>
                </div>
            </form>
          
            </div>

            

            {{-- End Comment --}}
        </div>
        {{-- End Right Side --}}
    </div>
</x-app-layout>