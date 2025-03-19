@extends('Component.Layout')

@section('content')
    
<div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-2">
    <div class="flex">
        <h2 class="uppercase text-xl p-2 font-bold">Kelas {{$kelas->nama}} | Wali : {{$kelas->guru->nama_lengkap ?? '-'}} | Ketua : {{$kelas->siswa->nama_lengkap ?? '-'}} </h2> 
    </div>
    <div class="flex gap-4">
      <div class="pt-2">
            <button data-modal-target="delete-modal-{{ $kelas->id }}" data-modal-toggle="delete-modal-{{ $kelas->id }}" class="font-medium text-blue-600  hover:underline cursor-pointer">
              <svg class="w-8 h-8 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
            </svg>
            </button>
            <div id="delete-modal-{{ $kelas->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative w-full max-w-sm max-h-full ">
                  <!-- Modal content -->
                  <div class="relative text-center bg-secondary rounded-lg shadow-md ">
                    <!-- Modal body -->
                    <div class="p-3">
                      <svg class="mx-auto mb-2 text-gray-400 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                          <h2 class="font-semibold text-lg mb-2 text-dark">Yakin Ingin Hapus Kelas <b>{{$kelas->nama}}</b> ?</h2>    
                          <div class="flex justify-between text-white">
                            <button type="button" class="py-1 px-2 bg-red-700 font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" data-modal-hide="delete-modal-{{ $kelas->id }}">Tidak</button>
                            <a class="py-1 px-6 bg-primary font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" href={{route('kelas.delete', $kelas->id)}} >Ya</a>
                          </div>
                    </div>        
                  </div>
              </div>
          </div>
          <button id="dropdownHoverButton-{{$kelas->id}}" data-dropdown-toggle="dropdownHover-{{$kelas->id}}" class="font-medium text-blue-600  hover:underline cursor-pointer ">
              <svg class="w-8 h-8 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>
          </button>
          <div id="dropdownHover-{{$kelas->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 ">
            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownHoverButton-{{$kelas->id}}">
              <li>
                <a type="button" data-modal-target="edit-walikelas-{{$kelas->id}}" data-modal-toggle="edit-walikelas-{{$kelas->id}}" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Ubah Wali Kelas</a>
              </li>
              <li>
                <a type="button" data-modal-target="edit-ketua-{{$kelas->id}}" data-modal-toggle="edit-ketua-{{$kelas->id}}" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Ubah Ketua Kelas</a>
              </li>
              <li>
                <a type="button" data-modal-target="add-siswa-{{$kelas->id}}" data-modal-toggle="add-siswa-{{$kelas->id}}" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">+Siswa</a>
              </li>
              <li>
                <a type="button" data-modal-target="add-guru-{{$kelas->id}}" data-modal-toggle="add-guru-{{$kelas->id}}" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">+Guru</a>
              </li>
            </ul>
        </div>


          <div id="edit-walikelas-{{$kelas->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                          Ubah Wali Kelas {{$kelas->nama}}
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-walikelas-{{$kelas->id}}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{route('wali.update', $kelas->id)}}" method="POST">
                          @csrf
                          @method('POST')
                            <div>
                              <select name="guru_id" id="guru_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                @foreach ($guru as $g)
                                <option value="{{ $g->id }}" {{ $g->id == $kelas->guru_id ? 'selected' : '' }}>{{ $g->nama_lengkap }}</option>
                               @endforeach
                            </select>
                            @error('guru_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            </div>
                            <button type="submit" class="w-full uppercase text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            
                        </form>
                    </div>
                </div>
            </div>
          </div>

          <div id="add-siswa-{{$kelas->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                          Tamabah Guru Kelas {{$kelas->nama}}
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-siswa-{{$kelas->id}}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{route('store.siswakelas', $kelas->id)}}" method="POST">
                          @csrf
                          @method('POST')
                            <div>
                              <select name="siswa_id" id="siswa_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                @foreach ($siswa as $s)
                                <option value="{{ $s->id }}" >{{ $s->nama_lengkap }}</option>
                               @endforeach
                            </select>
                            @error('siswa_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            </div>
                            <button type="submit" class="w-full uppercase text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            
                        </form>
                    </div>
                </div>
            </div>
          </div>

          <div id="add-guru-{{$kelas->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                          Tamabah Guru Kelas {{$kelas->nama}}
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-guru-{{$kelas->id}}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{route('store.gurukelas', $kelas->id)}}" method="POST">
                          @csrf
                          @method('POST')
                            <div>
                              <select name="guru_id" id="guru_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                @foreach ($guru as $g)
                                <option value="{{ $g->id }}" >{{ $g->nama_lengkap }}</option>
                               @endforeach
                            </select>
                            @error('guru_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            </div>
                            <button type="submit" class="w-full uppercase text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            
                        </form>
                    </div>
                </div>

            </div>
          </div>

          <div id="edit-ketua-{{$kelas->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                          Ubah Ketua Kelas {{$kelas->nama}}
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-ketua-{{$kelas->id}}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{route('ketua.update', $kelas->id)}}" method="POST">
                          @csrf
                          @method('POST')
                            <div>
                              <select name="siswa_id" id="siswa_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                @foreach ($siswa as $s)
                                <option value="{{ $s->id }}" {{ $s->id == $kelas->siswa_id ? 'selected' : '-' }}>{{ $s->nama_lengkap }}</option>
                               @endforeach
                            </select>
                            @error('siswa_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            </div>
                            <button type="submit" class="w-full uppercase text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            
                        </form>
                    </div>
                </div>

            </div>
          </div>


      </div>
      <div class="pt-2">
          @if (Session::has('message'))
          <div class="flex items-center  p-2 mb-2 text-sm text-blue-800 rounded-lg bg-red-50 " >
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <p class="alert" {{Session::get('alert-class', 'alert-info')}}>{{Session::get('message')}}</p>
          </div>
          @endif
          <div class="flex gap-2">
            @error('nama')
            <div class="flex items-center p-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">{{$message}}</span>
              </div>
            </div>
            @enderror
            @error('guru_id')
            <div class="flex items-center p-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">{{$message}}</span>
              </div>
            </div>
            @enderror
           
          </div>
          
      </div>
    </div>
</div>

@foreach ($tabelguru as $tabelguru)
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
          <tr>
              <th scope="col" class="px-6 py-3">
                  ID
              </th>
              <th scope="col" class="px-6 py-3">
                  Nama Guru
              </th>
              <th scope="col" class="px-6 py-3">
                  Keterangan
              </th>
              <th scope="col" class="px-6 py-3">
                  Aksi
              </th>

          </tr>
      </thead>
      <tbody>
          <tr class="bg-white border-b  hover:bg-gray-50 ">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
               {{$tabelguru->id}}
              </th>
              <td class="px-6 py-4">
                 {{$tabelguru->guru->nama_lengkap ?? '-'}}
              </td>
              <td class="px-6 py-4">
                 {{$tabelguru->guru->mapel ?? '-'}}
              </td>
              <td class="flex px-6 py-4">
                  <button data-modal-target="delete-modal-{{ $tabelguru->id }}" data-modal-toggle="delete-modal-{{ $tabelguru->id }}" class="font-medium text-blue-600  hover:underline cursor-pointer">
                    <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                  </svg>
                  </button>
                  <div id="delete-modal-{{ $tabelguru->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-sm max-h-full ">
                        <!-- Modal content -->
                        <div class="relative text-center bg-secondary rounded-lg shadow-md ">
                          <!-- Modal body -->
                          <div class="p-3">
                            <svg class="mx-auto mb-2 text-gray-400 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                           </svg>
                                <h2 class="font-semibold text-lg mb-2 text-dark">Yakin Ingin Hapus <b>{{$tabelguru->guru->nama_lengkap}}</b> ?</h2>    
                                <div class="flex justify-between text-white">
                                  <button type="button" class="py-1 px-2 bg-red-700 font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" data-modal-hide="delete-modal-{{ $tabelguru->id }}">Tidak</button>
                                  <a class="py-1 px-6 bg-primary font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" href={{route('delete.gurukelas', $tabelguru->id)}} >Ya</a>
                                </div>
                          </div>        
                        </div>
                    </div>
                </div>
              </td> 
          </tr>
      </tbody>
  </table>
</div>
@endforeach


@foreach ($tabelsiswa as $tabelsiswa)
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
          <tr>
              <th scope="col" class="px-6 py-3">
                  ID
              </th>
              <th scope="col" class="px-6 py-3">
                  Nama Guru
              </th>
              <th scope="col" class="px-6 py-3">
                  Keterangan
              </th>
              <th scope="col" class="px-6 py-3">
                  Aksi
              </th>

          </tr>
      </thead>
      <tbody>
          <tr class="bg-white border-b  hover:bg-gray-50 ">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
               {{$tabelsiswa->id}}
              </th>
              <td class="px-6 py-4">
                 {{$tabelsiswa->siswa->nama_lengkap ?? '-'}}
              </td>
              <td class="px-6 py-4">
                 {{$tabelsiswa->siswa->jk ?? '-'}}
              </td>
              <td class="flex px-6 py-4">
                  <button data-modal-target="delete-modal-{{ $tabelsiswa->id }}" data-modal-toggle="delete-modal-{{ $tabelsiswa->id }}" class="font-medium text-blue-600  hover:underline cursor-pointer">
                    <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                  </svg>
                  </button>
                  <div id="delete-modal-{{ $tabelsiswa->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-sm max-h-full ">
                        <!-- Modal content -->
                        <div class="relative text-center bg-secondary rounded-lg shadow-md ">
                          <!-- Modal body -->
                          <div class="p-3">
                            <svg class="mx-auto mb-2 text-gray-400 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                           </svg>
                                <h2 class="font-semibold text-lg mb-2 text-dark">Yakin Ingin Hapus <b>{{$tabelsiswa->siswa->nama_lengkap}}</b> ?</h2>    
                                <div class="flex justify-between text-white">
                                  <button type="button" class="py-1 px-2 bg-red-700 font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" data-modal-hide="delete-modal-{{ $tabelsiswa->id }}">Tidak</button>
                                  <a class="py-1 px-6 bg-primary font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" href={{route('delete.siswakelas',$tabelsiswa->id)}} >Ya</a>
                                </div>
                          </div>        
                        </div>
                    </div>
                </div>
              </td> 
          </tr>  
        
      </tbody>
  </table>
</div>
@endforeach
@endsection