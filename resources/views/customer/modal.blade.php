<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="login-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="btn-close login-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="login-form">
                    <form method="POST" id="modal-login-form"
                        onsubmit="uploadData1('modal-login-form','{{ route('customer.signIn') }}','acc-login-alert','acc-login-btn', event)">
                        @csrf
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/authenticity.png') }}" height="80">
                        </div>
                        <h4 class="welcome-title">Welcome Back !</h4>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input type="text" class="form-control" name="phone_number"
                                placeholder="Registered phone number">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="custom-btn">Sign In</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
