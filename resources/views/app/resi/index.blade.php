<x-app-layout>
    <x-card title="{{ $title }}" :create="false">
        <form method="POST" action="{{ route('cek-resi.show') }}">
            @csrf
            <div class="row d-flex align-items-center">
                <div class="col-md-4 col-12">
                    <x-form.select name="expedition" label="Ekspedisi" required>
                        @foreach ($lists->object() as $list)
                            <option value="{{ $list->code }}">{{ ucwords($list->description) }}</option>
                        @endforeach
                    </x-form.select>
                </div>

                <div class="col-md-8 col-12">
                    <x-form.input label="Nomor Resi" name="receipt_number" value="{{ old('receipt_number') }}"
                        required />
                </div>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Cek Resi</button>
            </div>
        </form>
    </x-card>
</x-app-layout>
