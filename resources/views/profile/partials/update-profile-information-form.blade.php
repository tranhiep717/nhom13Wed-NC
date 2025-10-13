<div class="section-title text-center">
    <h3 class="title">Profile Information</h3>
</div>

<form method="post" action="{{ route('profile.update') }}" class="checkout-form">
    @csrf
    @method('patch')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="text-uppercase">Name</label>
                <input id="name" name="name" type="text" class="input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                @if($errors->has('name'))
                    <div class="text-danger mt-1">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="text-uppercase">Email</label>
                <input id="email" name="email" type="email" class="input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                @if($errors->has('email'))
                    <div class="text-danger mt-1">{{ $errors->first('email') }}</div>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="small text-muted">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="btn-link text-primary">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 small text-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone" class="text-uppercase">Phone</label>
                <input id="phone" name="phone" type="text" class="input" autocomplete="tel" value="{{ old('phone', $user->phone) }}" />
                @if($errors->has('phone'))
                    <div class="text-danger mt-1">{{ $errors->first('phone') }}</div>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="address" class="text-uppercase">Address</label>
                <input id="address" name="address" type="text" class="input" autocomplete="address-line1" value="{{ old('address', $user->address) }}" />
                @if($errors->has('address'))
                    <div class="text-danger mt-1">{{ $errors->first('address') }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="primary-btn">{{ __('Update Profile') }}</button>

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success mt-3" style="display: block;" id="success-message">
                {{ __('Profile updated successfully!') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 3000);
            </script>
        @endif
    </div>
</form>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>
