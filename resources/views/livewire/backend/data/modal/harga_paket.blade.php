<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle max-w sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form method="POST" wire:submit.prevent="kirimData">
                @csrf
                <div class="bg-white px-4 pt-5 md:pb-4 p-6  pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Input Nama Fitur Paket" wire:model="judul_jasa_paket">
                            @error('judul_jasa_paket') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Deskripsi Fitur Paket" wire:model="sub_title_harga_jasa_paket">
                            @error('sub_title_harga_jasa_paket') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                            <input type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" wire:model="harga_jasa_paket">
                            @error('harga_jasa_paket') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div class="border border-black rounded-md p-5">
                            <h3 class="text-black font-semibold text-base mb-4">Fitur Paket</h3>
                            <div class="grid grid-cols-3 gap-4  items-center">
                                <div>
                                    <select wire:model="fitur_harga_paket_id.0" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 py-2">
                                    <option>Pilih Fitur</option>
                                        @foreach ($fiturpaket as $fitur)
                                            <option value="{{$fitur['id']}}">{{$fitur['nama_fitur_harga_paket']}}</option>

                                        @endforeach
                                    </select>
                                    @error('fitur_harga_paket_id.0') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror

                                </div>
                                <div>
                                    <input type="text" wire:model="nama_jasa_paket.0" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-2 " placeholder="Input disini">
                                    @error('nama_jasa_paket.0') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror

                                </div>
                                <div>
                                    <button class="bg-blue-500 text-white text-xs rounded-md px-3 py-2" wire:click.prevent="tambah({{$i}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    </button>
                                </div>
                            </div>

                            @foreach ($inputs as $key => $value)
                                <div class="grid grid-cols-3 gap-4  items-center my-2">
                                    <div>
                                    <select wire:model="fitur_harga_paket_id.{{$value}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Pilih Fitur</option>
                                        @foreach ($fiturpaket as $fitur)
                                            <option value="{{$fitur['id']}}">{{$fitur['nama_fitur_harga_paket']}}</option>

                                        @endforeach
                                    </select>
                                    @error('fitur_harga_paket_id.{{$value}}') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror

                                </div>
                                <div>
                                    <input type="text" wire:model="nama_jasa_paket.{{$value}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input disini">
                                    @error('nama_jasa_paket.{{$value}}') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror

                                </div>
                                <div>
                                    <button class="bg-blue-500 text-white text-xs rounded-md px-3 py-2" wire:click.prevent="tambah({{$i}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    </button>

                                    <button class="bg-red-500 text-white text-xs rounded-md px-3 py-2" wire:click.prevent="kurangi({{$key}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    </button>
                                </div>
                                </div>
                            @endforeach

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
