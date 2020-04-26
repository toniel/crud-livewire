<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $nama_depan;
    public $nama_belakang;
    public $no_hp;
    public $email;
    public $contact_id;

    public $listeners = ['showContact'];
    public $saveMethod='simpan';


    public function render()
    {
        return view('livewire.contact-create');
    }

    public function addContact()
    {
        $this->validate([
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'no_hp'=>'required',
            'email'=>'required|email',
        ]);

        Contact::create([
            'nama_depan'=>$this->nama_depan,
            'nama_belakang'=>$this->nama_belakang,
            'no_hp'=>$this->no_hp,
            'email'=>$this->email,
        ]);
        session()->flash('success', 'Kontak baru berhasil ditambahan');
        $this->resetForm();

    }

    public function showContact($contact)
    {
        # code...
        $this->contact_id=$contact['id'];
        $this->nama_depan=$contact['nama_depan'];
        $this->nama_belakang=$contact['nama_belakang'];
        $this->no_hp=$contact['no_hp'];
        $this->email=$contact['email'];

        $this->saveMethod='update';

    }

    public function updateContact()
    {
        # code...
        Contact::find($this->contact_id)->update([
            'nama_depan'=>$this->nama_depan,
            'nama_belakang'=>$this->nama_belakang,
            'no_hp'=>$this->no_hp,
            'email'=>$this->email,
        ]);
        session()->flash('success','Kontak diupdate');
        $this->resetForm();

    }

    public function deleteContact()
    {
        Contact::destroy($this->contact_id);
        session()->flash('success',$this->nama_depan.' '.$this->nama_belakang.' berhasil dihapus');
        $this->resetForm();
        $this->saveMethod='simpan';

    }

    public function resetForm()
    {
        $this->contact_id = '';
        $this->nama_depan = '';
        $this->nama_belakang = '';
        $this->no_hp = '';
        $this->email = '';
        $this->emit('contactAdded');


    }
}
