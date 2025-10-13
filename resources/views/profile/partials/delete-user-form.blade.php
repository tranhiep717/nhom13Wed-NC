<div class="section-title text-center">
    <h3 class="title">Delete Account</h3>
</div>

<div class="text-center">
    <p style="color: #8D99AE; margin-bottom: 20px;">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>

    <button type="button" class="btn btn-danger" id="deleteAccountBtn" style="background-color: #D10024; border-color: #D10024; padding: 10px 25px; border-radius: 40px;">
        {{ __('Delete Account') }}
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 8px;">
            <div class="modal-header" style="border-bottom: 1px solid #E4E7ED;">
                <h5 class="modal-title" id="deleteAccountModalLabel" style="color: #2B2D42; font-weight: 600;">
                    <i class="fa fa-exclamation-triangle" style="color: #D10024; margin-right: 8px;"></i>
                    {{ __('Are you sure you want to delete your account?') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true" style="font-size: 24px;">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('profile.destroy') }}" id="deleteAccountForm">
                <div class="modal-body" style="padding: 25px;">
                    @csrf
                    @method('delete')

                    <div class="text-center" style="margin-bottom: 20px;">
                        <i class="fa fa-warning" style="font-size: 48px; color: #D10024; margin-bottom: 15px;"></i>
                        <p style="color: #8D99AE; font-size: 14px; line-height: 1.5;">
                            {{ __('This action cannot be undone. All of your data will be permanently deleted.') }}
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="deletePassword" class="text-uppercase" style="font-weight: 600; color: #2B2D42;">
                            {{ __('Confirm with your password') }}
                        </label>
                        <input id="deletePassword" name="password" type="password" class="input"
                               placeholder="{{ __('Enter your password') }}" required
                               style="margin-top: 8px;" />
                        @error('password')
                            <div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #E4E7ED; padding: 20px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="border-radius: 40px; padding: 10px 20px; margin-right: 10px;">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn btn-danger"
                            style="background-color: #D10024; border-color: #D10024; border-radius: 40px; padding: 10px 20px;">
                        <i class="fa fa-trash" style="margin-right: 5px;"></i>
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->has('password'))
{{-- <script>
    $(document).ready(function() {
        $('#deleteAccountModal').modal('show');
    });
</script> --}}
@endif

<script>
$(document).ready(function() {
    // Ensure modal works when clicking delete button
    $('#deleteAccountBtn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        console.log('Delete button clicked'); // Debug log

        // Show modal with static backdrop
        $('#deleteAccountModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    });

    // Handle close buttons
    $('#deleteAccountModal').on('click', '[data-dismiss="modal"], .close', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#deleteAccountModal').modal('hide');
    });

    // Reset form when modal is hidden
    $('#deleteAccountModal').on('hidden.bs.modal', function () {
        $('#deleteAccountForm')[0].reset();
        $('.text-danger').hide();
    });

    // Focus on password field when modal is shown
    $('#deleteAccountModal').on('shown.bs.modal', function () {
        setTimeout(function() {
            $('#deletePassword').focus();
        }, 150);
    });

    // Form validation and submission
    $('#deleteAccountForm').on('submit', function(e) {
        var password = $('#deletePassword').val().trim();
        if (password === '') {
            e.preventDefault();
            alert('Please enter your password to confirm deletion.');
            $('#deletePassword').focus();
            return false;
        }

        if (!confirm('Are you absolutely sure? This action cannot be undone!')) {
            e.preventDefault();
            return false;
        }

        return true;
    });

</script>
