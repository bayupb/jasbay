<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KeunggulanModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Keunggulan extends Component
{
    public $keunggulan, $keunggulan_id, $nama_keunggulan, $gambar_keunggulan, $deskripsi_keunggulan, $gambar_keunggulan_lama;
    use WithFileUploads;
    public $modalOpen = 0;
    public $konfirmasihapus;
    public $hapusId = '';

    public $isUploaded = false;

    public function openModal(){
        $this->modalOpen = true;
    }


    public function resetModal(){
        $this->nama_keunggulan = '';
        $this->gambar_keunggulan = '';
        $this->gambar_keunggulan_lama = '';
        $this->deskripsi_keunggulan = '';
    }

    public function closeModal(){
        $this->modalOpen = false;
        $this->resetModal();
    }


    public function kirimData(){
        $gambar_keunggulan_validasi = '';

        if($this->gambar_keunggulan != $this->gambar_keunggulan_lama){
            $gambar_keunggulan_validasi = 'required|max:1024|mimes:svg,png,webp,jpg';
        }

        $this->validate([
            'nama_keunggulan' => 'required',
            'deskripsi_keunggulan' => 'required',
            'gambar_keunggulan' => $gambar_keunggulan_validasi,
        ]);

        if($this->gambar_keunggulan != $this->gambar_keunggulan_lama){
            $fileGambar = public_path('\storage\\').$this->gambar_keunggulan;
            if(File::exists($fileGambar)){
                File::delete($fileGambar);
            }
            $fileGambar1 = $this->gambar_keunggulan->store('keunggulan', 'public');
        }else{
            $fileGambar1 = $this->gambar_keunggulan;
        }

        $keunggulan= KeunggulanModel::updateOrCreate(['id'=> $this->keunggulan_id ],
    [
        'nama_keunggulan' => $this->nama_keunggulan,
        'deskripsi_keunggulan' => $this->deskripsi_keunggulan,
        'gambar_keunggulan' => $fileGambar1,
    ]);

    $oldFilesTmp = Storage::files('livewire-tmp');

    foreach($oldFilesTmp as $filetmp){
        Storage::delete($filetmp);
    }


    session()->flash('message', $this->keunggulan_id ? 'Berhasil mengubah data ini!' :  'Berhasil menambahkan data ini!', 3000);

    $this->closeModal();
    $this->resetModal();

    $tmpFile = Storage::get('/livewire-tmp/'.request('gambar_keunggulan'));
    Storage::put('/keunggulan/'.request('gambar_keunggulan'), $tmpFile);
    Storage::delete('/livewire-tmp/'.request('gambar_keunggulan'));

    return $keunggulan->toArray();

    }

    public function messages (){
        return [
            'nama_keunggulan.required' => 'Nama tidak boleh kosong.',
            'deskripsi_keunggulan.required' => 'Deskripsi tidak boleh kosong.'
        ];
    }

    public function edit($keunggulan_id){
        $this->keunggulan_id = $keunggulan_id;
        $keunggulan = KeunggulanModel::find($keunggulan_id);
        $this->keunggulan_id = $keunggulan->id;
        $this->nama_keunggulan = $keunggulan->nama_keunggulan;
        $this->deskripsi_keunggulan = $keunggulan->deskripsi_keunggulan;
        $this->gambar_keunggulan = $keunggulan->gambar_keunggulan;
        $this->gambar_keunggulan_lama = $keunggulan->gambar_keunggulan;
        $this->openModal();
        $this->isUploaded = true;

    }

    public function konfirmasi($id){
        // $carapemesanan = CaraPemesananModel::find($id);
        $this->konfirmasihapus = $id;
    }

    public function delete($id){
        $keunggulan = KeunggulanModel::find($id);
        $fileGambar = public_path('\storage\\').$keunggulan->gambar_keunggulan;
        if(File::exists($fileGambar)){
            File::delete($fileGambar);
        }
        $keunggulan->delete();

        if($keunggulan){
            session()->flash('deleted','Berhasil menghapus data ini!', $this->nama_keunggulan, 3000);
        }else{
            session()->flash('deleted','Gagal menghapus data ini!', $this->nama_keunggulan, 3000);

        }

    }
    public function render()
    {
        $keunggulan = KeunggulanModel::latest()->get();
        return view('livewire.backend.keunggulan',[
            'keunggulanModel' => $keunggulan
        ])->layout('layouts.app');
    }
}
