@extends('Component.Layout')

@section('content')
    
<div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between ">
    <div class="flex">
        <h2 class="uppercase text-xl p-2 font-bold">Data Orang Tua</h2> 
    </div>
    <div class="flex gap-4">
      <div class="pt-2">
          <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="font-medium text-blue-600  hover:underline">
              <svg class="w-10 h-10 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>
          </button>
          <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                          Tambah Data Orang tua
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                      <form class="space-y-4" action="{{ route('orangtua.store') }}" method="POST" >
                        @csrf
                        @method('POST')
                        
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                            @error('nama')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded">Tambah Guru</button>
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
          </div>
      </div>
    </div>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Id
              </th>
              <th scope="col" class="px-6 py-3">
                  Nama
              </th>
              
          </tr>
      </thead>
      <tbody>
         @foreach ($orangtuas as $orangtua)      
          <tr class="bg-white border-b  hover:bg-gray-50 ">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
               {{$orangtua->id}}
              </th>
              <td class="px-6 py-4">
              {{$orangtua->nama}}
              </td>
          </tr>
          @endforeach
              {{--<td class="flex px-6 py-4">
                  <button data-modal-target="edit-modal-{{ $guru->id }}" data-modal-toggle="edit-modal-{{ $guru->id }}" class="font-medium text-blue-600  hover:underline">
                    <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                  </svg>
                  </button>

                <!-- Main modal -->
                <div id="edit-modal-{{ $guru->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative p-4 w-full max-w-3xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900 ">
                              Edit Data Guru {{$guru->nama}}
                            </h3>
                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-modal-{{$guru->id}}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                          <form class="space-y-4" action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="grid grid-cols-2 gap-4 mb-2">
                            <div>
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                                <input type="text" name="nama" value="{{$guru->nama}}" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                @error('nama')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nuptk" class="block mb-2 text-sm font-medium text-gray-900">NUPTK</label>
                                <input type="number" name="nuptk" value="{{$guru->nuptk}}"  id="nuptk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                @error('nuptk')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-2">
                            <div>
                                <label for="jk" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="laki-laki" {{ $guru->jk == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="perempuan" {{ $guru->jk == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jk')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="mapel" class="block mb-2 text-sm font-medium text-gray-900">Mata Pelajaran</label>
                                <input type="text" name="mapel"  value="{{$guru->mapel}}" id="mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                @error('mapel')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-2">
                            <div>
                                <label for="tempatlahir" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir</label>
                                <input type="text" name="tempatlahir"  value="{{$guru->tempatlahir}}" id="tempatlahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                @error('tempatlahir')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                              <label for="tanggallahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                              <input type="date" name="tanggallahir" id="tanggallahir" 
                                     value="{{ $guru->tanggallahir->format('Y-m-d') }}" 
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                              @error('tanggallahir')
                                  <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                          </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-2">
                            <div>
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <textarea name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{$guru->alamat}}</textarea>
                                @error('alamat')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="fotoguru" class="block mb-2 text-sm font-medium text-gray-900">Foto Guru</label>      
                                <img src="{{ asset('/storage/foto/' . $guru->fotoguru) }}" class="w-10 mb-2">                       
                                <input type="file" name="fotoguru" id="fotoguru" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " />
                                @error('fotoguru')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded">Update Guru</button>
                        </form>
                        </div>
                    </div>
                  </div>
                </div> 

                  <button data-modal-target="delete-modal-{{ $guru->id }}" data-modal-toggle="delete-modal-{{ $guru->id }}" class="font-medium text-blue-600  hover:underline">
                    <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                  </svg>
                  </button>
                  <div id="delete-modal-{{ $guru->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-sm max-h-full ">
                        <!-- Modal content -->
                        <div class="relative text-center bg-secondary rounded-lg shadow-md ">
                          <!-- Modal body -->
                          <div class="p-3">
                            <svg class="mx-auto mb-2 text-gray-400 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                           </svg>
                                <h2 class="font-semibold text-lg mb-2 text-dark">Yakin Ingin Hapus <b>{{$guru->nama}}</b> ?</h2>    
                                <div class="flex justify-between text-white">
                                  <button type="button" class="py-1 px-2 bg-red-700 font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" data-modal-hide="delete-modal-{{ $guru->id }}">Tidak</button>
                                  <a class="py-1 px-6 bg-primary font-semibold rounded-lg block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" href={{url('admin/guru/'.$guru->id.'/delete')}} >Ya</a>
                                </div>
                          </div>        
                        </div>
                    </div>
                </div>
              </td>
          </tr>
          @endforeach --}}
      </tbody>
  </table>
  <div>
    {{-- {{ $gurus->links() }} --}}
  </div>
</div>
@endsection