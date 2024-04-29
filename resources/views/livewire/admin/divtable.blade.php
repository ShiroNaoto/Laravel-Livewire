<div>
    <body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
        <div class="wrapper"> <!--Wrapper-->
            <nav class="main-header navbar navbar-expand navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{ route('livewire.admin.dashboard') }}" class="brand-link" wire:navigate>
                    <img src="{{ '/dist/img/loginanimated.gif' }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-light">Ticket Service</span>
                </a>
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ '/dist/img/user9.jpg' }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            @auth
                                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                            @else
                            @endauth
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-header">Admin Page</li>
                            <li class="nav-item">
                                <a href="{{ route('livewire.admin.dashboard') }}" class="nav-link" wire:navigate>
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('livewire.admin.usertable') }}" class="nav-link" wire:navigate>
                                    <i class="fas fa-users"></i>
                                    <p> Manage Users </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="fas fa-object-group"></i>
                                    <p> Manage Division </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" id="logout-button" class="nav-link" wire:click="logout">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p> Sign out </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper"> <!--Data Table-->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Division Lists</h1>
                            </div>
                            <div class="col-sm-6">
                                <div class="breadcrumb float-sm-right">
                                    <button type="button" wire:loading.attr="disabled"
                                        class="btn btn-block btn-primary btn-lg" data-toggle="modal"
                                        data-target="#modal-primary"><i class="fa fa-plus-circle mr-1"></i>Create
                                        Division</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-4 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search Division here!"
                            wire:model.live="searchDiv">
                    </div>
                    <table id="table1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Head</th>
                                <th>Duty</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @foreach ($divpage as $division)
                                <tr>
                                    <td>{{ $division->name }}</td>
                                    <td>{{ $division->code }}</td>
                                    <td>{{ $division->head }}</td>
                                    <td>{{ $division->duty }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="btn-group">
                                            <a class="btn btn-app" wire:click = "loadDivision({{ $division->id }})"
                                                data-toggle="modal">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                            <a class="btn btn-app" wire:click.prevent="divdelete({{ $division->id }})">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <div wire:ignore.self class="modal fade" data-backdrop="static" data-keyboard="false"
                                    id="updateDivLabel{{ $division->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-primary">
                                            <div class="modal-header">

                                                <h4 class="modal-title">Update Division</h4>
                                                <button type="button" wire:click = "clearText" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <input type="text" wire:model="name" class="form-control"
                                                        placeholder="Enter Division Name">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-archive"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <input type="text" wire:model="code" class="form-control"
                                                        placeholder="Enter Division Code">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-keyboard"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <input type="text" wire:model="head" class="form-control"
                                                        placeholder="Enter Division Head">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user-tie"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-briefcase"></i></span>
                                                    </div>
                                                    <textarea class="form-control" wire:model="duty" placeholder="Enter Duty"></textarea>
                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-light"
                                                        id="updateDivClose{{ $division->id }}" wire:click="clearText"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        wire:click="divUpdate({{ $division->id }})"
                                                        class="btn btn-outline-light">Save changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                    <div>{{ $divpage->links() }}</div>
                </div>
                <aside class="control-sidebar control-sidebar-dark"></aside>
            </div> <!--End Data Table-->

            <div class="modal fade" wire:ignore.self id="modal-primary" data-backdrop="static"
                data-keyboard="false"> <!--Create Modal-->
                <div class="modal-dialog">
                    <div class="modal-content bg-primary">
                        <div class="modal-header">

                            <h4 class="modal-title">Create Division</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input type="text" wire:model="name" class="form-control"
                                    placeholder="Enter Division Name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-archive"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" wire:model="code" class="form-control"
                                    placeholder="Enter Division Code">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-keyboard"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" wire:model="head" class="form-control"
                                    placeholder="Enter Division Head">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user-tie"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                </div>
                                <textarea class="form-control" wire:model="duty" placeholder="Enter Duty"></textarea>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" id="createDivClose"
                                    data-dismiss="modal">Close</button>
                                <button type="button" wire:click="divStore"
                                    class="btn btn-outline-light">Create</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!--End Modal-->
        </div> <!--End Wrapper-->

        <script>
            window.addEventListener('swal:loading', event => {
                let data = event.detail;
                console.log(data);

                Swal.fire({
                    title: 'Loading',
                    html: `<span style="color: white;">${data.text}</span>`,
                    timer: event.detail.timer,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    showCancelButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    willClose: () => {
                        $('#updateDivLabel' + event.detail.onComplete).modal('show');
                    }
                });
            });
        </script>

        <script>
            window.addEventListener('created', event => {
                let data = event.detail;
                console.log(data);

                if (data.type === 'error' && data.error) {
                    let errorMessage = data.error.replace(/\(and \d+ more errors\)/g, '');
                    Swal.fire({
                        icon: 'error',
                        title: errorMessage,
                        showConfirmButton: false,
                        timer: 3000,
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
                        html: `<span style="color: white;">${data.text}</span>`,
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#createDivClose').click();
                        }
                    });
                }

            });
        </script>

        <script>
            window.addEventListener('updated', event => {
                let data = event.detail;
                console.log(data);

                if (data.type === 'error' && data.error) {
                    let errorMessage = data.error.replace(/\(and \d+ more errors\)/g, '');
                    Swal.fire({
                        icon: 'error',
                        title: errorMessage,
                        showConfirmButton: false,
                        timer: 3000,
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
                        html: `<span style="color: white;">${data.text}</span>`,
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#updateDivClose${data.divId}`).click();
                        }
                    });
                }
            });
        </script>

        <script>
            window.addEventListener('deletedivconfirm', event => {
                let data = event.detail;
                console.log(data);
                Swal.fire({
                    title: data.title,
                    html: `<span style="color: white;">${data.text}</span>`,
                    icon: data.icon,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteConfirmed')
                    }
                });
            });

            window.addEventListener('divDeleted', event => {
                let data = event.detail;
                console.log(data);
                Swal.fire({
                    title: data.title,
                    html: `<span style="color: white;">${data.text}</span>`,
                    icon: data.icon
                });
            });
        </script>
    </body>
</div>
