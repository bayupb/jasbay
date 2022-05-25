<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\FiturHargaPaketModel;
use Illuminate\Support\Facades\Storage;

class FiturHargaPaket extends Component
{
    public $fitur_harga_paket, $fitur_harga_paket_id, $nama_fitur_harga_paket;
    use WithFileUploads;
    public $modalOpen = 0;
    public $konfirmasihapus;
    public $hapusId = '';


    public function openModal(){
        $this->modalOpen = true;
    }


    public function resetModal(){
        $this->nama_fitur_harga_paket = '';
    }

    public function closeModal(){
        $this->modalOpen = false;
        $this->resetModal();
    }


    public function kirimData(){


        $this->validate([
            'nama_fitur_harga_paket' => 'required',
        ]);


        $fitur_harga_paket= FiturHargaPaketModel::updateOrCreate(['id'=> $this->fitur_harga_paket_id ],
    [
        'nama_fitur_harga_paket' => $this->nama_fitur_harga_paket,

    ]);

    $oldFilesTmp = Storage::files('livewire-tmp');

    foreach($oldFilesTmp as $filetmp){
        Storage::delete($filetmp);
    }


    session()->flash('message', $this->fitur_harga_paket_id ? 'Berhasil mengubah data ini!' :  'Berhasil menambahkan data ini!', 3000);

    $this->closeModal();
    $this->resetModal();


    return $fitur_harga_paket->toArray();

    }

    public function messages (){
        return [
            'nama_fitur_harga_paket.required' => 'Nama tidak boleh kosong.',

        ];
    }

    public function edit($fitur_harga_paket_id){
        $this->fitur_harga_paket_id = $fitur_harga_paket_id;
        $fitur_harga_paket = FiturHargaPaketModel::find($fitur_harga_paket_id);
        $this->fitur_harga_paket_id = $fitur_harga_paket->id;
        $this->nama_fitur_harga_paket = $fitur_harga_paket->nama_fitur_harga_paket;
        $this->openModal();

    }

    public function konfirmasi($id){
        // $carapemesanan = CaraPemesananModel::find($id);
        $this->konfirmasihapus = $id;
    }

    public function delete($id){
        $fitur_harga_paket = FiturHargaPaketModel::find($id);
        $fitur_harga_paket->delete();

        if($fitur_harga_paket){
            session()->flash('deleted','Berhasil menghapus data ini!', $this->nama_fitur_harga_paket, 3000);
        }else{
            session()->flash('deleted','Gagal menghapus data ini!', $this->nama_fitur_harga_paket, 3000);

        }

    }
    public function render()
    {
        $fitur_harga_paket = FiturHargaPaketModel::latest()->get();
        return view('livewire.backend.fitur-harga-paket',
        [
            'fiturPaket'    => $fitur_harga_paket
        ])->layout('layouts.app');
    }
}
