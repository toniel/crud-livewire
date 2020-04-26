<div>
    <form wire:submit.prevent={{ $saveMethod=="simpan"?"addContact":"updateContact" }}>
        <div class="form-group">
            <label for="contactId">Contact ID</label>
            <input disabled id="contactId" class="form-control" type="text" wire:model="contact_id">
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="nama_depan">Nama Depan</label>
                    <input id="nama_depan" wire:model="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror " type="text">
                    @error('nama_depan')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input id="nama_belakang" wire:model="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror" type="text">
                    @error('nama_belakang')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input id="no_hp" wire:model="no_hp" class="form-control @error('no_hp') is-invalid @enderror" type="text">
                    @error('no_hp')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" type="email">
                    @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm" >{{ ucfirst($saveMethod) }}</button>
            @if ($saveMethod=='update')

            <button onclick="return confirm('Apakah anda yakin akan hapus?') || event.stopImmediatePropagation()" type="button" wire:click="deleteContact()" class="btn btn-danger btn-sm" >Hapus</button>
            @endif
        </div>
    </form>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
</div>
