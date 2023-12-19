<div>
    <li class="flex flex-col md:flex-row text-center">
        <div class="md:mr-1 font-bold md:font-normal">
            {{$this->Count}}
        </div>
        <button wire:click="$dispatch('openModal', { component: 'follower-modal', arguments: { userId: {{ $userId }} }})" class="text-neutral-500 md:text-black">
            {{$this->Count>1 ? __('followers') : __('follower')}}
        </button>
        {{-- <span class="text-neutral-500 md:text-black">
            {{$this->Count>1 ? __('followers') : __('follower')}}
        </span> --}}

    </li>
</div>
