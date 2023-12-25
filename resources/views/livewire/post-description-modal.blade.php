<div class="p-3">
   <h1 class="text-center">Image description</h1>
   
   
   <form action="/p/create" method="POST" enctype="multipart/form-data">
    @csrf
       <div class="col-span-3 sm:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700">
            {{ __('description') }} </label>
        <textarea type="text" name="description" id="company-website"
               class="focus:ring-neutral-500 focus:border-neutral-500 flex-1 mt-1 block w-full rounded sm:text-sm border-gray-300"></textarea>
       
    </div>
       <div class="w-20 h-20 rounded-full my-3">
           <img src="{{$image}}" alt="" name="image">
       </div>
       {{-- @dd($image) --}}
       <input type="hidden" name="image" value="{{$image}}">
       <button type="submit">post</button>
    </div>
   </form>
