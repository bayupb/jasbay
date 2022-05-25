<?php

namespace App\Http\Livewire\Backend\Data;

use Livewire\Component;
use App\Models\Backend\CaraPemesananModel;

class CaraPemesanan extends Component
{
    public $cara_pemesanan, $cara_pemesanan_id , $nama_cara, $deskripsi_cara, $status;

    public $modalOpen = 0;
    public $konfirmasihapus;
    public $hapusId = '';

    public function openModal(){
        $this->modalOpen = true;
    }



    public function resetModal(){
        $this->nama_cara = '';
        $this->deskripsi_cara = '';
        $this->status = '';
    }

    public function closeModal(){
        $this->modalOpen = false;
        $this->resetModal();
    }

    public function rules(){
        return [
            'nama_cara' => 'required',
            'deskripsi_cara' => 'required',
            'status' => 'required',
        ];
    }
    public function messages (){
        return [
            'nama_cara.required' => 'Nama tidak boleh kosong.',
            'deskripsi_cara.required' => 'Deskripsi tidak boleh kosong.',
            'status.required' => 'Status harus di pilih!',
        ];
    }

    public function kirimData(){
        $this->validate();

        $pemesanan= CaraPemesananModel::updateOrCreate(['id'=> $this->cara_pemesanan_id ],
    [
        'nama_cara' => $this->nama_cara,
        'deskripsi_cara' => $this->deskripsi_cara,
        'status' => $this->status,
    ]);

    session()->flash('message', $this->cara_pemesanan_id ? 'Berhasil mengubah data ini!' :  'Berhasil menambahkan data ini!', 3000);

    $this->closeModal();
    $this->resetModal();

    return $pemesanan->toArray();

    }

    public function edit($id){
        $carapemesanan = CaraPemesananModel::find($id);
        $this->cara_pemesanan_id = $carapemesanan->id;
        $this->nama_cara = $carapemesanan->nama_cara;
        $this->deskripsi_cara = $carapemesanan->deskripsi_cara;
        $this->status = $carapemesanan->status;
        $this->openModal();
    }

    public function konfirmasi($id){
        // $carapemesanan = CaraPemesananModel::find($id);
        $this->konfirmasihapus = $id;
    }

    public function delete($id){
        CaraPemesananModel::find($id)->delete();
        session()->flash('deleted','Berhasil menghapus data ini!', $this->nama_cara, 3000);
    }


    public function render()
    {
        $carapemesanan = CaraPemesananModel::orderBy('created_at' , 'asc')->get();
        return view('livewire.backend.data.cara-pemesanan',[
            'carapemesanan' => $carapemesanan
        ])->layout('layouts.app');
    }
}
