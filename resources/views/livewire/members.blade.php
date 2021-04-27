<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Anggota
    </h2>
</x-slot>

<div class="py-12">

    <div class="  max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8 ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="create()"
                class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded-full my-3">Tambah
                Data</button>

            @if ($isModal)
                @include('livewire.create')
            @endif



            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100 border">
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">
                            Nama
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">
                            Telp
                        </th>
                        {{-- <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">K3 Awal</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">K3 Akhir</th> --}}
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $row)
                        <tr>
                            <td scope="col"
                                class="px-6 py-3 text-left text-sm font-bold text-gray-800  tracking-wider border">
                                {{ $row->name }}</td>
                            <td scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-800  tracking-wider border">
                                {{ $row->email }}</td>
                            <td scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-800  tracking-wider border">
                                {{ $row->phone_number }}</td>
                            {{-- <td scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $row->k3_awal }}</td>
                            <td scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $row->k3_akhir }}</td> --}}

                            <td scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border">
                                {!! $row->status_label !!}</td>

                            <td class=" border px-6 py-4 whitespace-nowrap">
                                {{-- <button wire:click="show({{ $row->id }})"
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Edit
                                </button> --}}


                                <a href="/member/{{ $row->id }}"
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Details
                                </a>

                            </td>
                            {{-- <td scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="edit({{ $row->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Edit</button>
                                <button wire:click="delete({{ $row->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">Hapus</button>
                            </td> --}}
                        </tr>
                    @empty
                        <td scope="col" class="border px-4 py-2 text-center ">Tidak ada data
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
