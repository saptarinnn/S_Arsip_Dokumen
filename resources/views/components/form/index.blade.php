<form {{ $attributes }} method="POST">
    @csrf
    {{ $slot }}
</form>
