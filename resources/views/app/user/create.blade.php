<x-app-layout>

    <x-card title="{{ $title }}" :create="false">

        <x-form action="{{ route('user.store') }}">
            <x-form.input label="Username" name="username" value="{{ old('username') }}" autofocus />
            <x-form.input label="Nama Lengkap" name="fullname" value="{{ old('fullname') }}" required />
            <x-form.input label="Password" type="password" name="password" required />
            <x-form.select name="role" label="Role" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->uuid }}">{{ ucwords($role->name) }}</option>
                @endforeach
            </x-form.select>
            <div class="d-flex gap-3">
                <x-form.back href="{{ route('user.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

</x-app-layout>
