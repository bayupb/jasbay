<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\PaketModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Paket extends Component
{
    public $paket, $paket_id, $nama_paket, $gambar_paket, $deskripsi_paket, $gambar_paket_lama;
    use WithFileUploads;
    public $modalOpen = 0;
    public $konfirmasihapus;
    public $hapusId = '';

    public function openModal(){
        $this->modalOpen = true;
    }



    public function resetModal(){
        $this->nama_paket = '';
        $this->gambar_paket = '';
        $this->deskripsi_paket = '';
    }

    public function closeModal(){
        $this->modalOpen = false;
        $this->resetModal();
    }


    public function kirimData(){
        $gambar_paket_validasi = '';

        if($this->gambar_paket != $this->gambar_paket_lama){
            $gambar_paket_validasi = 'required|max:1024|mimes:svg,png,webp,jpg';
        }

        $this->validate([
            'nama_paket' => 'required',
            'deskripsi_paket' => 'required',
            'gambar_paket' => $gambar_paket_validasi,
        ]);

        if($this->gambar_paket != $this->gambar_paket_lama){
            $fileGambar = public_path('\storage\\').$this->gambar_paket;
            if(File::exists($fileGambar)){
                File::delete($fileGambar);
            }
            $fileGambar1 = $this->gambar_paket->store('paket', 'public');
        }else{
            $fileGambar1 = $this->gambar_paket;
        }

        $paket= PaketModel::updateOrCreate(['id'=> $this->paket_id ],
    [
        'nama_paket' => $this->nama_paket,
        'deskripsi_paket' => $this->deskripsi_paket,
        'gambar_paket' => $fileGambar1,
    ]);

    session()->flash('message', $this->paket_id ? 'Berhasil mengubah data ini!' :  'Berhasil menambahkan data ini!', 3000);

    $this->closeModal();
    $this->resetModal();

    return $paket->toArray();

    }

    public function messages (){
        return [
            'nama_paket.required' => 'Nama tidak boleh kosong.',
            'deskripsi_paket.required' => 'Deskripsi tidak boleh kosong.'
        ];
    }

    public function edit($id){
        $paket = PaketModel::find($id);
        $this->paket_id = $paket->id;
        $this->nama_paket = $paket->nama_paket;
        $this->deskripsi_paket = $paket->deskripsi_paket;
        $this->gambar_paket = $paket->gambar_paket;
        $this->gambar_paket_lama = $paket->gambar_paket;
        $this->openModal();
    }

    public function konfirmasi($id){
        // $carapemesanan = CaraPemesananModel::find($id);
        $this->konfirmasihapus = $id;
    }

    public function delete($id){
        PaketModel::find($id)->delete();
        session()->flash('deleted','Berhasil menghapus data ini!', $this->nama_paket, 3000);
    }

    public function render()
    {
        $paket = PaketModel::latest()->take(3)->get();
        return view('livewire.backend.paket',[
            'paketModal' => $paket
        ])->layout('layouts.app');
    }
}
