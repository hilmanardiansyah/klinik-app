<x-app-layouts title="Edit User">
    <div class="card">
        <div class="card-header"><h4>Form Edit User</h4></div>
        <div class="card-body col-md-8">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        @foreach ($roles as $r)
                            <option value="{{ $r->name }}" {{ $user->hasRole($r->name) ? 'selected' : '' }}>
                                {{ $r->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layouts>
