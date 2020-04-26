<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
    protected $listeners = ['contactAdded'];
    protected $updatesQueryString = ['search'=>['except'=>'']];
    public $search;
    public function render()
    {

        $contacts = $this->search==null?Contact::orderBy('nama_depan')->paginate(5):Contact::where('nama_depan','like','%'.$this->search.'%')->orWhere('nama_belakang','like','%'.$this->search.'%')->orderBy('nama_depan')->paginate(5);
        return view('livewire.contact-index',compact('contacts'));
    }

    public function contactAdded()
    {
    }

    public function showContact($contactId)
    {
        $contact = Contact::find($contactId);
        $this->emit('showContact',$contact);
    }
}
