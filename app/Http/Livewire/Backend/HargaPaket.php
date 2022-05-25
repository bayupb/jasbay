<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\JasaPaket;
use Livewire\WithFileUploads;
use App\Models\FiturHargaPaketModel;
use Illuminate\Support\Facades\Storage;

class HargaPaket extends Component
{
    public $harga_paket, $harga_paket_id, $judul_jasa_paket, $harga_jasa_paket, $sub_title_harga_jasa_paket, $nama_jasa_paket , $fitur_harga_paket_id;
    use WithFileUploads;
    public $modalOpen = 0;
    public $konfirmasihapus;
    public $hapusId = '';
    public $inputs = [];
    public $i = 1;


    public function openModal(){
        $this->modalOpen = true;
    }


    public function resetModal(){
        $this->judul_jasa_paket = '';
        $this->harga_jasa_paket = '';
        $this->sub_title_harga_jasa_paket = '';
        $this->nama_jasa_paket = '';
        $this->fitur_harga_paket_id = '';
    }

    public function closeModal(){
        $this->modalOpen = false;
        $this->resetModal();
    }

    public function rules(){
        return [
         'judul_jasa_paket' => 'required',
         'harga_jasa_paket' => 'required',
         'sub_title_harga_jasa_paket' => 'required',
         'nama_jasa_paket' => 'required',
         'fitur_harga_paket_id' => 'required',
         'nama_jasa_paket.*' => 'required',
         'fitur_harga_paket_id.*' => 'required',
        ];
    }
    public function messages (){
        return [
            'judul_jasa_paket.required' => 'Nama tidak boleh kosong.',
            'harga_jasa_paket.required' => 'Harga tidak boleh kosong.',
            'sub_title_harga_jasa_paket.required' => 'Sub nama tidak boleh kosong.',
            'nama_jasa_paket.required' => 'Nama fitur tidak boleh kosong.',
            'fitur_harga_paket_id.required' => 'Fitur tidak boleh kosong.',

            'nama_jasa_paket.*.required' => 'Nama fitur tidak boleh kosong.',
            'fitur_harga_paket_id.*.required' => 'Fitur tidak boleh kosong.',

        ];
    }

    public function tambah($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function kurangi($i){
        unset($this->inputs[$i]);
    }

    public function kirimData(){


        $this->validate();

        $fitur_harga_paket= JasaPaket::updateOrCreate(['id'=> $this->harga_paket_id ],
    [
        'judul_jasa_paket' => $this->judul_jasa_paket,
        'harga_jasa_paket' => $this->harga_jasa_paket,
        'sub_title_harga_jasa_paket' => $this->sub_title_harga_jasa_paket,
        'nama_jasa_paket' => $this->nama_jasa_paket,
        'fitur_harga_paket_id' => $this->fitur_harga_paket_id,

    ]);

    $oldFilesTmp = Storage::files('livewire-tmp');

    foreach($oldFilesTmp as $filetmp){
        Storage::delete($filetmp);
    }


    session()->flash('message', $this->harga_paket_id ? 'Berhasil mengubah data ini!' :  'Berhasil menambahkan data ini!', 3000);

    $this->closeModal();
    $this->resetModal();


    return $fitur_harga_paket->toArray();

    }



    public function edit($harga_paket_id){
        $this->harga_paket_id = $harga_paket_id;
        $fitur_harga_paket = JasaPaket::find($harga_paket_id);
        $this->fitur_harga_paket_id = $fitur_harga_paket->id;
        $this->nama_fitur_harga_paket = $fitur_harga_paket->nama_fitur_harga_paket;
        $this->openModal();

    }

    public function konfirmasi($id){
        // $carapemesanan = CaraPemesananModel::find($id);
        $this->konfirmasihapus = $id;
    }

    public function delete($id){
        $fitur_harga_paket = JasaPaket::find($id);
        $fitur_harga_paket->delete();

        if($fitur_harga_paket){
            session()->flash('deleted','Berhasil menghapus data ini!', $this->judul_jasa_paket, 3000);
        }else{
            session()->flash('deleted','Gagal menghapus data ini!', $this->judul_jasa_paket, 3000);

        }

    }
    public function render()
    {
        $fiturpaket=FiturHargaPaketModel::all();
        $hargapaket = JasaPaket::latest()->get();

        return view('livewire.backend.harga-paket' , [
            'hargapaket'    => $hargapaket,
            'fiturpaket'    => $fiturpaket,
        ])->layout('layouts.app');
    }
}
