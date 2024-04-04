<x-app-layout>
    <x-card title="{{ $title }}" :create="false">
        <form method="POST" action="{{ route('document_report.show') }}">
            @csrf
            <div class="row d-flex align-items-center">
                <div class="col-lg-4 col-12">
                    <x-form.select name="document" label="Dokumen" required>
                        <option value="masuk">Masuk</option>
                        <option value="keluar">Keluar</option>
                    </x-form.select>
                </div>
                <div class="col-lg-4 col-12">
                    <x-form.select name="category" label="Kategori" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->category_name) }}</option>
                        @endforeach
                    </x-form.select>
                </div>
                <div class="col-lg-4 col-12">
                    <x-form.select name="year" label="Tahun" required>
                        @for ($year = '2023'; $year <= date('Y'); $year++) <option value="{{ $year }}">
                            {{ $year }}</option>
                            @endfor
                    </x-form.select>
                </div>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Print Laporan</button>
            </div>
        </form>
    </x-card>
</x-app-layout>
