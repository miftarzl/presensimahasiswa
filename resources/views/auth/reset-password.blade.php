<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden"
           name="token"
           value="{{ $token }}">

    <div class="mb-3">
        <label>Email</label>

        <input type="email"
               name="email"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Password Baru</label>

        <input type="password"
               name="password"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Konfirmasi Password</label>

        <input type="password"
               name="password_confirmation"
               class="form-control">
    </div>

    <button class="btn btn-primary">
        Reset Password
    </button>
</form>