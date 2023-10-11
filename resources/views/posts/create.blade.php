<x-app-layout>
    <div class="card p-10">
        {{-- Title --}}
        <div class="text-3xl mb-10">
            {{__('create a new post')}}
        </div>
        {{-- End Title --}}

        {{-- Errors --}}
        <div class="flex flex-col justify-center items-center w-full">
            @if ($errors->any())
                <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        {{-- End Errors --}}

        {{-- Form --}}
        <form action="/p/create" method="post" class="w-full" enctype="multipart/form-data">
            @csrf
            <input type="file" class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl" name="image" id="file_input">
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or GIF</p>

            <textarea name="description"  rows="5" class="mt-10 w-full border border-gray-200 rounded-xl" placeholder="{{__('Write a Description')}}"></textarea>
            <x-primary-button class="mt-4">{{__('Create Post')}}</x-primary-button>
        </form>
        {{-- End Form --}}
    </div>
</x-app-layout>