<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center gap-4">
                        <x-primary-button tag="a" href="{{ route('books.create') }}">
                            Tambah Data Buku
                        </x-primary-button>

                        <form method="GET" action="{{ route('books.index') }}" class="flex items-center gap-2">
                            <label for="sort" class="text-sm font-medium">Urutan:</label>
                            <select name="sort" id="sort"
                                class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-gray-100">
                                <option value="title" {{ request('sort') === 'title' ? 'selected' : '' }}>Judul A-Z
                                </option>
                                <option value="title_desc" {{ request('sort') === 'title_desc' ? 'selected' : '' }}>
                                    Judul Z-A</option>
                            </select>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm">
                                Sort
                            </button>
                        </form>
                    </div>
                    <br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tahun</th>
                                <th>Penerbit</th>
                                <th>Kota</th>
                                <th>Cover</th>
                                <th>Kode Rak</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $num++ }} </td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->city }}</td>
                                <td>
                                    <img src="{{ asset('storage/cover_buku/' . $book->cover) }}" width="100px"
                                        alt="Cover" />
                                </td>
                                <td>{{ $book->bookshelf->code }}-{{ $book->bookshelf->name }}</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <x-primary-button tag="a" href="{{ route('books.edit', $book->id) }}">
                                            Edit
                                        </x-primary-button>

                                        <form action="{{ route('books.destroy', $book->id) }}" method="post"
                                            onsubmit="return confirm('Apakah anda yakin?');">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button type="submit">
                                                Hapus
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
