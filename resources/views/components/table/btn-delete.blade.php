<form {{ $attributes }} method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm text-danger" type="submit"><i class='bx bx-trash'></i></button>
</form>
