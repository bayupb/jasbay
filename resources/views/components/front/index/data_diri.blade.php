<div>
    <section class="-mt-10 mb-10">
        <div class="max-w-6xl container mx-auto px-5 md:px-0">
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4 py-2">
                @foreach ($dataDiri as $item)
                    <div class="bg-white shadow-md p-4 rounded-md hover:-translate-y-4 duration-200">
                        <div class="flex flex-col">
                            <h4 class="text-base font-semibold capitalize">{{$item['nama_cara']}}</h4>
                            <p class="text-sm font-light mt-2">
                                {{$item['deskripsi_cara']}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
