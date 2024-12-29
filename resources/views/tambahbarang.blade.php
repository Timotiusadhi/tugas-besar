@extends("index")

@section('content')

<head>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
</head>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">

        <H1 class=text-center>
            Tambah Barang
        </H1>
        <br>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       <form method="POST"action="{{route('penambahan.post')}}">
            @csrf
            <div class="mb-4">
                <label for="penambah" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" name="name" id="name" placeholder="ketik nama *gunakan nama akun"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                     autofocus required>
             @error('name')
                 <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
                    
            </div>

            <div class="mb-4">
                <label for="NamaBar" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                <input type="text" name="NamaBar" id="NamaBar" placeholder="ketik nama barang"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value=""required>
               
            </div>

            <div class="mb-4">
                <label for="JumlahBar" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Barang</label>
                <input type="text" name="JumlahBar" id="JumlahBar" placeholder="ketik Jumlah barang"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value=""required>
                
            </div>

            <div class="mb-4">
                <label for="BeratBar" class="block text-gray-700 text-sm font-bold mb-2"> Berat Barang</label>
                <select type="text" name="BeratBar" id="BeratBar" placeholder="Pilih berat barang"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value=""required>
                    <option value=""></option>
                    <option value="3kg"> Dibawah 3Kg </option>
                    <option value="10kg">3-10Kg</option>
                    <option value="100kg">11-100Kg</option>
                    <option value="100++">100Kg++</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="DateBar" class="block text-gray-700 text-sm font-bold mb-2">Tanggal penambahan Barang</label>
                <input type="date" name="DateBar" id="DateBar" placeholder="pilih tanggal"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value=""required>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Tambah Barang</button>
            </div>
            
        </form>
    </div>
</div>

@endsection
