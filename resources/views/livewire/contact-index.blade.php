<div class="media mt-3 mb-3">
    <div class="media-body">
         <input class="form-control mb-2" type="text" wire:model="search" placeholder="Search Contact" >
        @foreach ($contacts as $contact)
            <li class="mb-2"><a wire:click="showContact({{ $contact->id }})" href="#">{{ $contact->nama_depan }} {{ $contact->nama_belakang }}</a></li>
        @endforeach
        {{ $contacts->links() }}
    </div>
</div>
