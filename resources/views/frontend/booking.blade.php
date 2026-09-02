<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>ekapaksicup81</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body>
    <section class="max-w-4xl mx-auto px-6 py-8 bg-white shadow-2xl rounded-2xl mt-10">
    <div class="mb-6">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-1">Pemesanan Tiket</h1>
        <p class="text-gray-500 text-sm">Event: <span class="font-semibold">{{ $data->name }}</span></p>
        <p class="text-[#dfbc6f] font-semibold mt-1">Harga Tiket: Rp. {{ number_format($data->price, 0, ',', '.') }} / orang</p>
        <p class="text-gray-600 text-sm">
            <span class="font-semibold">Lokasi:</span> {{ $data->venue }} <br>
            <span class="font-semibold">Waktu:</span> {{ \Carbon\Carbon::parse($data->start_time)->translatedFormat('l, d M Y') }}
        </p>
    </div>

    <div class="bg-[#fef9ec] border-l-4 border-[#dfbc6f] text-[#a2781f] p-4 rounded mb-6">
        <p><strong>Note:</strong> Silakan lengkapi form berikut. E-Ticket akan dikirimkan ke email Anda.</p>
    </div>

    @if (count($errors) > 0)
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="{{ route('front.booking.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 focus:border-gray-300 px-4 py-3"
                    value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700">Email Aktif</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 focus:border-gray-300 px-4 py-3"
                    value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="birthdate" class="block font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" id="birthdate" name="birthdate"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 focus:border-gray-300 px-4 py-3"
                    value="{{ old('birthdate') }}" required>
            </div>

            <div>
                <label for="phone" class="block font-medium text-gray-700">No. Whatsapp</label>
                <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxxxx"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 focus:border-gray-300 px-4 py-3"
                    value="{{ old('phone') }}" required>
            </div>

            <div class="md:col-span-2">
                <label for="address" class="block font-medium text-gray-700">Alamat Lengkap</label>
                <input type="text" id="address" name="address"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 focus:border-gray-300 px-4 py-3"
                    value="{{ old('address') }}" required>
            </div>

            <div class="md:col-span-2">
                <label for="quantity" class="block font-medium text-gray-700">Jumlah Tiket</label>
                <input type="number" id="quantity" name="quantity" min="1"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 focus:border-gray-300 px-4 py-3"
                    value="{{ old('quantity', 1) }}" required>
            </div>
        </div>

        <input type="hidden" name="price" value="{{ $data->price }}">
        <input type="hidden" name="id_event" value="{{ $data->id }}">

        <div class="mt-6 text-right">
            <button type="submit"
                class="px-6 py-3 bg-[#dfbc6f] hover:bg-[#c9a851] text-white font-semibold rounded-lg shadow-md transition duration-200">
                Pesan Sekarang
            </button>
        </div>
    </form>
</section>



        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
        <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="MyWMKxaqbmPjHCWc5pJc8";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>
    </body>
</html>
