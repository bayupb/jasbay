<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form method="POST" wire:submit.prevent="kirimData">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Ketikan kalimat nama" wire:model="nama_keunggulan">
                            @error('nama_keunggulan') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <textarea wire:model="deskripsi_keunggulan" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>

                            @error('deskripsi_keunggulan') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
                            <input wire:model="gambar_keunggulan" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Upload Gambar bentuk svg</div>
                            @error('gambar_keunggulan') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            @if ($gambar_keunggulan_lama || $gambar_keunggulan)
                                Photo Preview:
                                <img src="{{empty(!$gambar_keunggulan_lama) ? url($gambar_keunggulan_lama) : $gambar_keunggulan->temporaryUrl()}}" class="w-24 h-24">
                                {{-- <img src="{{ $isUploaded ? $gambar_keunggulan->temporaryUrl() :  url('storage/keunggulan/'.$gambar_keunggulan)  }}" width="250" height="300"> --}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Simpan
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Tutup
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
