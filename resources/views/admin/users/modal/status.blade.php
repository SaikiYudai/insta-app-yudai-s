{{-- deactivate --}}
<div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-user-slash me-1"></i>Deactivate User
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete user {{ $user->name }}?</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.users.deactivate',$user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- activate --}}
<div class="modal fade" id="activate-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-user-check me-1"></i>Activate User
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to activate user {{ $user->name }}?</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.users.activate',$user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">activate</button>
                </form>
            </div>
        </div>
    </div>
</div>
