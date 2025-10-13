<div class="section-title text-center">
    <h3 class="title">Update Password</h3>
</div>

<form method="post" action="{{ route('password.update') }}" class="checkout-form">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="update_password_current_password" class="text-uppercase">Current Password</label>
        <input id="update_password_current_password" name="current_password" type="password" class="input" autocomplete="current-password" />
        @if($errors->updatePassword->has('current_password'))
            <div class="text-danger mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="update_password_password" class="text-uppercase">New Password</label>
        <input id="update_password_password" name="password" type="password" class="input" autocomplete="new-password" />
        @if($errors->updatePassword->has('password'))
            <div class="text-danger mt-1">{{ $errors->updatePassword->first('password') }}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="update_password_password_confirmation" class="text-uppercase">Confirm Password</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="input" autocomplete="new-password" />
        @if($errors->updatePassword->has('password_confirmation'))
            <div class="text-danger mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</div>
        @endif
    </div>

    <div class="form-group text-center">
        <button type="submit" class="primary-btn">{{ __('Update Password') }}</button>

        @if (session('status') === 'password-updated')
            <div class="alert alert-success mt-3" style="display: block;" id="password-success-message">
                {{ __('Password updated successfully!') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('password-success-message').style.display = 'none';
                }, 3000);
            </script>
        @endif
    </div>
</form>
