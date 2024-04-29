<div>

    <body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="{{ '/dist/img/loginanimated.gif' }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-light">Ticket Service</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ '/dist/img/user9.jpg' }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            @auth
                                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                            @else
                                <!-- Display some default content or nothing if needed -->
                            @endauth
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
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

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-header">Admin Page</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            <li class="nav-item">
                                <a href="{{ route('livewire.admin.usertable') }}" class="nav-link" wire:navigate>
                                    <i class="fas fa-users"></i>
                                    <p> Manage Users </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('livewire.admin.divtable') }}" class="nav-link" wire:navigate>
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
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $ticketCount }}</h3>

                                        <p>Tickets Total</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $resolvedTickets }} </h3>

                                        <p>Tickets Resolved</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-thumbs-up"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $pendingTickets }}</h3>

                                        <p>Tickets Pending</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-pause"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $processingTickets }}</h3>

                                        <p>Proccessing Tickets</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-truck-loading"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-ticket-alt mt-2"></i> Tickets Requests</h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link {{ $activeTab === 'pending' ? 'active' : '' }}"
                                                wire:click = "resetTable" href="#"
                                                wire:click.prevent="switchTab('pending')">Ticket Pending | Process</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ $activeTab === 'process' ? 'active' : '' }}"
                                                wire:click = "resetTable" href="#"
                                                wire:click.prevent="switchTab('process')">Request Resolved</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content p-0">
                                <div class="chart tab-pane {{ $activeTab === 'pending' ? 'active' : '' }}"
                                    id="pending">
                                    <div class="card-body">
                                        <div class="mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-search fa-fw"></i></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="Search tickets..." wire:model.live="searchpending">
                                        </div>
                                        <table id="table1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Division</th>
                                                    <th>Severity</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>

                                            <tbody>
                                                @foreach ($pendingpage as $ticket)
                                                    @if (in_array($ticket->state, ['Pending', 'Processing']))
                                                        <tr>
                                                            <td class="text-center sorting_1">
                                                                @switch($ticket->state)
                                                                    @case('Pending')
                                                                        <span
                                                                            class="right badge p-2 badge-danger">{{ $ticket->state }}</span>
                                                                    @break

                                                                    @case('Processing')
                                                                        <span
                                                                            class="right badge p-2 badge-warning">{{ $ticket->state }}</span>
                                                                    @break

                                                                    @case('Resolved')
                                                                        <span
                                                                            class="right badge p-2 badge-success">{{ $ticket->state }}</span>
                                                                    @break

                                                                    @default
                                                                        <span
                                                                            class="right badge p-2 badge-secondary">{{ $ticket->state }}</span>
                                                                @endswitch
                                                            </td>

                                                            <td>{{ $ticket->usered->name }}</td>
                                                            <td>{{ $ticket->email }}</td>

                                                            <td>
                                                                @if ($ticket->divisioned)
                                                                    {{ $ticket->divisioned->code }}
                                                                @else
                                                                    <span class="text-warning">Division no longer
                                                                        exists.</span>
                                                                @endif
                                                            </td>

                                                            <td class="text-center sorting_1">
                                                                @switch($ticket->severity)
                                                                    @case('Critical')
                                                                        <span
                                                                            class="right badge p-2 badge-danger">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @case('High')
                                                                        <span
                                                                            class="right badge p-2 badge-warning">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @case('Medium')
                                                                        <span
                                                                            class="right badge p-2 badge-info">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @case('Low')
                                                                        <span
                                                                            class="right badge p-2 badge-success">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @default
                                                                        <span
                                                                            class="right badge p-2 badge-secondary">{{ $ticket->severity }}</span>
                                                                @endswitch
                                                            </td>

                                                            <td>{{ $ticket->description }}</td>

                                                            <td class="d-flex justify-content-center">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-app"
                                                                        wire:click="loadTicket({{ $ticket->id }})"
                                                                        data-toggle="modal">
                                                                        <i class="fas fa-edit"></i> Update
                                                                    </a>
                                                                    <a class="btn btn-app"
                                                                        wire:click.prevent="deleteTicketHome({{ $ticket->id }})">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            </thead>
                                        </table>
                                        {{ $pendingpage->links() }}
                                    </div>
                                </div>

                                <div class="chart tab-pane {{ $activeTab === 'process' ? 'active' : '' }}"
                                    id="process">
                                    <div class="card-body">
                                        <div class="mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-search fa-fw"></i></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                placeholder="Search tickets..." wire:model.live="searchresolved">
                                        </div>
                                        <table id="table2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Division</th>
                                                    <th>Severity</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>

                                            <tbody>
                                                @foreach ($resolvepage as $ticket)
                                                    @if ($ticket->state === 'Resolved')
                                                        <tr>
                                                            <td class="text-center sorting_1">
                                                                @switch($ticket->state)
                                                                    @case('Pending')
                                                                        <span
                                                                            class="right badge p-2 badge-danger">{{ $ticket->state }}</span>
                                                                    @break

                                                                    @case('Processing')
                                                                        <span
                                                                            class="right badge p-2 badge-warning">{{ $ticket->state }}</span>
                                                                    @break

                                                                    @case('Resolved')
                                                                        <span
                                                                            class="right badge p-2 badge-success">{{ $ticket->state }}</span>
                                                                    @break

                                                                    @default
                                                                        <span
                                                                            class="right badge p-2 badge-secondary">{{ $ticket->state }}</span>
                                                                @endswitch
                                                            </td>

                                                            <td>{{ $ticket->staffname }}</td>
                                                            <td>{{ $ticket->email }}</td>

                                                            <td>
                                                                @if ($ticket->divisioned)
                                                                    {{ $ticket->divisioned->code }}
                                                                @else
                                                                    <span class="text-warning">Division no longer
                                                                        exists.</span>
                                                                @endif
                                                            </td>

                                                            <td class="text-center sorting_1">
                                                                @switch($ticket->severity)
                                                                    @case('Critical')
                                                                        <span
                                                                            class="right badge p-2 badge-danger">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @case('High')
                                                                        <span
                                                                            class="right badge p-2 badge-warning">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @case('Medium')
                                                                        <span
                                                                            class="right badge p-2 badge-info">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @case('Low')
                                                                        <span
                                                                            class="right badge p-2 badge-success">{{ $ticket->severity }}</span>
                                                                    @break

                                                                    @default
                                                                        <span
                                                                            class="right badge p-2 badge-secondary">{{ $ticket->severity }}</span>
                                                                @endswitch
                                                            </td>

                                                            <td>{{ $ticket->description }}</td>

                                                            <td class="d-flex justify-content-center">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-app"
                                                                        wire:click="loadTicket({{ $ticket->id }})"
                                                                        data-toggle="modal">
                                                                        <i class="fas fa-edit"></i> Update
                                                                    </a>
                                                                    <a class="btn btn-app"
                                                                        wire:click.prevent="deleteTicketHome({{ $ticket->id }})">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            </thead>
                                        </table>
                                        {{ $resolvepage->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($tickets as $ticket)
                            <div wire:ignore.self class="modal fade" data-backdrop="static" data-keyboard="false"
                                id="updateTicket{{ $ticket->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-primary">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Ticket</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-lg-5">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-charging-station"></i></span>
                                                    </div>
                                                    <select wire:model="state" id="state"
                                                        class="form-control custom-select" required>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Processing">Processing</option>
                                                        <option value="Resolved">Resolved</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-quote-right"></i></span>
                                                    </div>
                                                    <textarea class="form-control" wire:model="remark" placeholder="Enter Remark"></textarea>
                                                </div>
                                            </div>

                                            <p>Requested By:</p>

                                            <div class="mb-1 row">
                                                <div class="col-lg-8">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            value="{{ $ticket->staffname }}" name="staffname"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-users"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            value="{{ $ticket->divisioned ? $ticket->divisioned->code : 'N/A' }}"
                                                            name="ticketdiv" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-at"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            value="{{ $ticket->email }}" name="email" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-exclamation-triangle"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            value="{{ $ticket->severity }}" name="severity" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-tv"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            value="{{ $ticket->category }}" name="category" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-sticky-note"></i></span>
                                                        </div>
                                                        <textarea class="form-control" name="description" readonly>{{ $ticket->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-light"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" wire:click = "ticketUpdate({{ $ticket->id }})"
                                                class="btn btn-outline-light" data-dismiss="modal">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
            </div>
        </div>
        </section>
</div>
</div>

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
                $('#updateTicket' + event.detail.onComplete).modal('show');
            }
        });
    });
</script>

<!--Delete Function Swal-->
<script>
    window.addEventListener('deletehomeTicket', event => {
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

    window.addEventListener('ticketDeleted', event => {
        let data = event.detail;
        console.log(data);
        Swal.fire({
            title: data.title,
            html: `<span style="color: white;">${data.text}</span>`,
            icon: data.icon
        });
    });
</script>
<!--Delete Function Swal END-->

<script>
    window.addEventListener('updated', event => {
        let data = event.detail;
        console.log(data);

        Swal.fire({
            icon: data.type,
            title: data.title,
            html: `<span style="color: white;">${data.text}</span>`,
            confirmButtonText: 'Ok',
        });
    });
</script>

</body>
</div>
