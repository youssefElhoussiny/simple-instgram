<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <h1 class="text-3xl">{{$count}}</h1>
    <button wire:click="add">+</button>
    

     
     <input wire:model.lazy="message" type="text">
    <h1>{{ $message }}</h1>
</div>
