<div>
    <div class="w-full flex flex-col max-w-6xl container mx-auto my-10">
        @if (session()->has('message'))
            <div id="toast-success" class="flex items-center p-4 mb-4 w-full text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('message') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-collapse-toggle="toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endif
        @if (session()->has('deleted'))
            <div id="toast-danger" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="ml-3 text-sm font-normal">{{session('deleted')}}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-collapse-toggle="toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>

        @endif

        <div class="my-2">
            <button wire:click="openModal()" type="button"
                class="my-2 flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-500 text-base font-bold text-white shadow-sm hover:bg-red-700">
                Tambah Data
            </button>
            @if($modalOpen)
            @include('livewire.backend.data.modal.fitur_harga_paket')
            @endif
        </div>
        <div class="flex flex-col w-full mt-5">
            <div class="overflow-x-auto shadow-md rounded-md">
                <div class="inline-block w-full align-middle ">
                    <div class="overflow-hidden w-full">
                        <table class=" w-full divide-y divide-gray-200 table-fixed text-center ">
                            <thead class="bg-blue-800 rounded-md text-center">
                                <tr class="text-center">

                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-white uppercase ">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-white uppercase ">
                                        Nama
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-white uppercase ">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($fiturPaket as $item)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 ">
                                        {{$loop->iteration}}</td>

                                    <td class="py-4 px-6 text-sm font-medium text-gray-900">
                                        {{$item['nama_fitur_harga_paket']}}</td>

                                    <td class="py-4 px-6 gap-2 text-sm font-medium">
                                        <button wire:click.prevent="edit({{$item['id']}})"
                                            class="bg-blue-400 rounded-md px-5 py-2 text-white">
                                            Edit
                                        </button>
                                        @if ($konfirmasihapus=== $item->id)
                                            <button wire:click.prevent="delete({{$item['id']}})" class="bg-red-600 ml-2 rounded-md px-5 py-2 text-white" type="button" data-modal-toggle="popup-modal">
                                            Anda Yakin?
                                            </button>

                                        @else
                                            <button wire:click.prevent="konfirmasi({{$item['id']}})" class="bg-red-600 ml-2 rounded-md px-5 py-2 text-white" type="button" data-modal-toggle="popup-modal">
                                                Hapus
                                            </button>

                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
