<div>

    <section class="my-10 py-10 md:px-0 px-5">
        <div class="max-w-6xl container mx-auto">
            <div class="text-center flex flex-col py-5">
                <h5 class="text-2xl font-bold text-black">Tersedia Paket</h5>
                <p class="text-base font-normal text-black mt-4">Layanan paket yang anda temukan disini</p>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 py-2">
                @foreach ($paketModel as $item )
                    <div class="bg-white shadow-md p-4 rounded-md hover:-translate-y-4 duration-200">
                        <div class="flex flex-col text-center p-4">
                            <img src="{{asset($item['gambar_paket'])}}" class="w-full h-40" alt="gambar">
                            <h4 class="text-base font-semibold capitalize mt-4">{{$item['nama_paket']}}</h4>
                            <p class="text-sm font-light mt-2">
                               {{$item['deskripsi_paket']}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
