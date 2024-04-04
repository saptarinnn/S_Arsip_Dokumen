<x-app-layout>

    <x-card title="{{ $title }}" :create="false">

        <x-form action="{{ route('role.store') }}">
            <x-form.input label="Nama Role" name="name" value="{{ old('name') }}" required autofocus />

            <div class="row">
                <div class="mb-4">
                    <small class="form-label mb-1">Permission</small>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="check-all" id="check-all" />
                                <label class="form-check-label" for="check-all">
                                    all-permission
                                </label>
                            </div>
                        </div>
                        @foreach ($datas as $data)
                            <div class="col-3">
                                <div class="form-check mt-2">
                                    <input class="@error('permission') is-invalid @enderror form-check-input"
                                        name="permission[]" type="checkbox" value="{{ $data->uuid }}"
                                        id="{{ $data->uuid }}" />
                                    <label class="form-check-label" for="{{ $data->uuid }}">
                                        {{ $data->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        @error('permission')
                            <div class="small mt-1 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-3">
                <x-form.back href="{{ route('role.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

    <x-slot name="script">
        <script type="module">
            $(document).ready(function() {

                let permissions = document.getElementsByName('permission[]');
                $('#check-all[type="checkbox"]').click(function() {
                    if (!$(this).prop("checked")) {
                        for (var i = 0; i < permissions.length; i++) {
                            if (permissions[i].type == 'checkbox')
                                permissions[i].checked = false;
                        }
                    } else if ($(this).prop("checked")) {
                        for (var i = 0; i < permissions.length; i++) {
                            if (permissions[i].type == 'checkbox')
                                permissions[i].checked = true;
                        }
                    }
                });
            });
        </script>
    </x-slot>

</x-app-layout>
