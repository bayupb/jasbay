<div>
    <section class="-mt-10 mb-10">
        <div class="max-w-6xl container mx-auto px-5 md:px-0">
            <div class="bg-white shadow-md rounded-md p-4">
                <form wire:submit.prevent="uploadtestimonial">
                    @csrf
                    <div>
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" value="{{ old('nama_testimonial') }}" wire:model="nama_testimonial" id="small-input" placeholder="Nama anda"
                            class="block p-2 capitalize w-full text-gray-900 bg-gray-50 rounded-lg border outline-none border-gray-100 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                            @error('nama_testimonial') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-2">
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Jabatan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" wire:model="jabatan_testimonial" id="small-input" placeholder="manager"
                            class="block p-2 w-full capitalize text-gray-900 bg-gray-50 rounded-lg border outline-none border-gray-100 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                             @error('jabatan_testimonial') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-2">
                        <label for="large-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Berikan pesan
                            mu <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="deskripsi_testimonial" id="large-input" rows="4" class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md
                        focus:ring-blue-500 focus:border-blue-500 outline-none">
                         @error('deskripsi_testimonial') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="text-sm text-white font-normal px-5 py-2 bg-blue-500 mt-4 rounded-md"> Kirim testimonial</button>
                </form>
            </div>
        </div>
    </section>

    <section class="my-5 py-5 md:px-0 px-5" wire:poll.keep-alive>
        <div class="max-w-6xl container mx-auto">
             @if (session()->has('message'))
                <div class="alert alert-success">

                </div>
                <div id="toast-default" class=" my-4 flex items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="ml-3 text-sm font-normal">{{ session('message') }}</div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-collapse-toggle="toast-default" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            @endif

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 py-2">

                @foreach ($Testimonials as $item)
                    <div class="bg-white shadow-sm shadow-blue-500 p-4 rounded-md hover:-translate-y-4 duration-200">
                        <div class="flex gap-4">
                            <img src="https://ui-avatars.com/api/?name={{ $item[ 'nama_testimonial' ]}}" alt="avatar"
                                class="h-10 w-10 rounded-full">
                                <div class="flex flex-col">
                                    <h5 class="text-base font-semibold capitalize">{{ $item[ 'nama_testimonial' ]}}</h5>
                                    <span class="text-xs font-normal capitalize">
                                        {{ $item[ 'jabatan_testimonial' ]}}</span>
                                </div>
                        </div>
                        <div class="mt-3">
                            <p class="text-sm font-extralight">{{ $item[ 'deskripsi_testimonial' ]}}</p>
                        </div>
                    </div>

                @endforeach

            </div>
            <div class="mt-4">
            {{$Testimonials->links()}}

            </div>
        </div>
    </section>
</div>
