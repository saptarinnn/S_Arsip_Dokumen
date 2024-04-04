<x-app-layout>

    <x-card title="{{ $title }}" :create="false">

        <x-form action="{{ route('user.update', $data->id) }}">
            @method('PUT')
            <x-form.input label="Username" name="username" value="{{ $data->username }}" required autofocus />
            <x-form.input label="Nama Lengkap" name="fullname" value="{{ $data->fullname }}" required />
            <x-form.select name="role" label="Role" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->uuid }}" {{ $role->name == $data->getRoleNames()[0] ? 'selected' : '' }}>
                        {{ ucwords($role->name) }}</option>
                @endforeach
            </x-form.select>
            <x-form.input label="" name="password" type="hidden" value="{{ $data->password }}" required />
            <div class="d-flex gap-3">
                <x-form.back href="{{ route('user.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

</x-app-layout>
