<div style="opacity: 0.9;">

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-success">
                <div class="card-header text-center">
                    <a href="#" class="h1"><img src="{{ '/dist/img/loginanimated.gif' }}" alt="AdminLTE Logo"
                            class="brand-image img-circle elevation-3" width="50" height="50"><b>Ticket</b>
                        System</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>


                    <!-- Email/Username -->
                    <div class="input-group mb-3">
                        <input id="userbane" type="text" wire:model='username' name="username" class="form-control"
                            placeholder="Enter Username" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input id="password" wire:model='password' type="password" name="password" class="form-control"
                            placeholder="Enter  Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                <label for="remember_me" class="form-check-label">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="button" wire:click='authLogin' wire:loading.attr="disabled"
                                class="btn btn-success btn-block">Sign In</button>
                        </div>
                    </div>

                    <p class="mb-0">
                        <a href="{{ route('livewire.auth.register') }}" class="text-center" wire:navigate>Register a new
                            membership</a>
                    </p>

                </div>
            </div>
        </div>

        <script>
            window.addEventListener('authlog', event => {
                let data = event.detail;
                console.log(data);

                if (data.type === 'error' && data.error) {
                    let errorMessage = data.error.replace(/\(and \d+ more errors\)/g, '');
                    Swal.fire({
                        icon: 'error',
                        title: errorMessage,
                        showConfirmButton: true,
                        showClass: {
                            popup: `animate__animated animate__tada`
                        },
                        hideClass: {
                            popup: `animate__animated animate__backOutRight animate__faster`
                        }
                    });
                } else {
                    Swal.fire({
                        icon: data.type,
                        title: data.title,
                        text: data.text,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        showCancelButton: false,
                    });
                }

            });
        </script>

        <script>
            window.addEventListener('swal:loading', event => {
                let timerInterval;
                Swal.fire({
                    title: "Checking User...",
                    html: "Please Wait!",
                    timer: 2000,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    showCancelButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                        timerInterval = setInterval(() => {}, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    Livewire.dispatch('authenticating');
                });
            });
        </script>

    </body>

</div>
