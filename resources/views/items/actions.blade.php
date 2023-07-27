<div class="d-flex" role="group" aria-label="Item Actions">
    <!-- Tombol Edit -->
    <button class="btn btn-primary btn-sm
    me-2" data-item-id="{{ $post->id }}" data-bs-toggle="modal"
        data-bs-target="#editModal_{{ $post->id }}"><i class="bi bi-pencil-square"></i></button>

    <!-- Tombol Add Stock -->
    <button class="btn btn-success btn-sm me-2"
        data-item-id="{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#addStockModal_{{ $post->id }}"><i
            class="bi bi-plus-square"></i></button>

    <!-- Form Delete -->
    <form id="deleteForm{{ $post->id }}" action="{{ route('items.destroy', $post->id) }}" method="post"
        class="flex-fill">
        @csrf
        @method('delete')
        <button type="submit" class="btn
        btn-danger btn-sm me-2 delete-button"
            data-name="{{ $post->code_item . ' ' . $post->name_item }}" data-id="{{ $post->id }}">
            <i class="bi bi-trash2"></i>
        </button>
    </form>
</div>
