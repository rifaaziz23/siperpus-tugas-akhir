<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('books.update', $books->id) }}" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="max-w-xl">
                        <x-input-label for="title" value="Judul" />

                        <x-text-input id="title" type="text" name="title" class="mt-1 block w-full"
                            :value="old('title', $books->title)" required />

                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    {{-- Penulis --}}
                    <div class="max-w-xl">
                        <x-input-label for="author" value="Penulis" />

                        <x-text-input id="author" type="text" name="author" class="mt-1 block w-full"
                            :value="old('author', $books->author)" required />

                        <x-input-error class="mt-2" :messages="$errors->get('author')" />
                    </div>

                    {{-- Tahun --}}
                    <div class="max-w-xl">
                        <x-input-label for="year" value="Tahun Terbit" />

                        <x-text-input id="year" type="number" name="year" class="mt-1 block w-full"
                            :value="old('year', $books->year)" required />

                        <x-input-error class="mt-2" :messages="$errors->get('year')" />
                    </div>

                    {{-- Penerbit --}}
                    <div class="max-w-xl">
                        <x-input-label for="publisher" value="Penerbit" />

                        <x-text-input id="publisher" type="text" name="publisher" class="mt-1 block w-full"
                            :value="old('publisher', $books->publisher)" required />

                        <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                    </div>

                    {{-- Kota --}}
                    <div class="max-w-xl">
                        <x-input-label for="city" value="Kota Terbit" />

                        <x-text-input id="city" type="text" name="city" class="mt-1 block w-full"
                            :value="old('city', $books->city)" required />

                        <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>

                    {{-- Kategori --}}
                    <div class="max-w-xl">
                        <x-input-label for="bookshelf_id" value="Kategori Rak Buku" />

                        <select id="bookshelf_id" name="bookshelf_id"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>

                            <option value="">-- Pilih Rak Buku --</option>

                            @foreach ($bookshelves as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('bookshelf_id', $books->bookshelf_id) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>

                        <x-input-error class="mt-2" :messages="$errors->get('bookshelf_id')" />
                    </div>

                    {{-- Cover --}}
                    <div class="max-w-xl">
                        <x-input-label for="cover" value="Cover Buku" />

                        @if ($books->cover)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $books->cover) }}" alt="Cover Buku"
                                    class="w-32 rounded shadow">
                            </div>
                        @endif

                        <input type="file" id="cover" name="cover"
                            class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300">

                        <p class="text-sm text-gray-500 mt-1">
                            Kosongkan jika tidak ingin mengganti cover.
                        </p>

                        <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                    </div>

                    {{-- Button --}}
                    <div class="flex items-center gap-4">
                        <a href="{{ route('books.index') }}">
                            <x-secondary-button type="button">
                                Cancel
                            </x-secondary-button>
                        </a>

                        <x-primary-button name="save" value="true">
                            Update Buku
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
