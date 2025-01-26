<x-admin-layout>
    <x-admin-nav></x-admin-nav>
    <x-admin-sidebar></x-admin-sidebar>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Member Activity</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Back</a></li>

                            <li class="breadcrumb-item active">members</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Investment</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a class="btn btn-block btn-primary btn-sm"
                                            onclick="Livewire.emit('openModal','admin.add-user-investment',{{ json_encode(['id' => $user->id])}} )">New
                                            Investment</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-investment', ['user' => $user])
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Deposits</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a class="btn btn-block btn-primary btn-sm"
                                            onclick="Livewire.emit('openModal','admin.add-user-deposit',{{ json_encode(['id' => $user->id])}} )">New
                                            Deposit</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-deposit', ['user' => $user])
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->


                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Crypto Withdrawals</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a class="btn btn-block btn-primary btn-sm"
                                            onclick="Livewire.emit('openModal','admin.add-user-withdrawal',{{ json_encode(['id' => $user->id])}} )">New
                                            Withdrawal</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-withdrawal', ['user' => $user])
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Fiat Withdrawals</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a onclick="Livewire.emit('openModal','admin.add-user-fiat-withdrawal',{{ json_encode(['id' => $user->id])}} )"
                                            class="btn btn-block btn-primary btn-sm">New Withdrawal</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-fiat-withdrawal', ['user' => $user])
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bot Subscriptions</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a onclick="Livewire.emit('openModal','admin.add-user-sub',{{ json_encode(['id' => $user->id])}} )"
                                            class="btn btn-block btn-primary btn-sm">add new</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-subs', ['user' => $user])
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row mt-3" id="refs">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Referrals</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a onclick="Livewire.emit('openModal','admin.add-user-downline',{{ json_encode(['id' => $user->id])}} )"
                                            class="btn btn-block btn-primary btn-sm">add referral</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-downline', ['user' => $user], key($user->id))
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Referral Income</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a onclick="Livewire.emit('openModal','admin.add-referral-income',{{ json_encode(['id' => $user->id])}} )"
                                            class="btn btn-block btn-primary btn-sm">fund</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-referral-income', ['user' => $user], key($user->id))
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
                {{-- row --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Promo</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a onclick="Livewire.emit('openModal','admin.add-user-promo',{{ json_encode(['id' => $user->id])}} )"
                                            class="btn btn-block btn-primary btn-sm">New Promo</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-promo', ['user' => $user], key($user->id))
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- USER WALLETS --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Wallets</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a onclick="Livewire.emit('openModal','admin.add-user-wallet',{{ json_encode(['id' => $user->id])}} )"
                                            class="btn btn-block btn-primary btn-sm">New Wallet</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @livewire('admin.manage-user-wallet', ['user' => $user], key($user->id))
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
    <x-admin-footer></x-admin-footer>
</x-admin-layout>

<script>
    Livewire.on('approvedInvestment', (e) => {
        toastr.success('investment approved.')
    })
    Livewire.on('addedDeposit', (e) => {
        toastr.success('deposit completed.')
    })

    Livewire.on('addedUserWithdrawal', (e) => {
        toastr.success('Withdrawal completed.')
    })

    Livewire.on('addedUserFiatWithdrawal', (e) => {
        toastr.success('Fiat Withdrawal completed.')
    })

    Livewire.on('editedFiatWithdrawal', (e) => {
        toastr.success('Fiat Withdrawal edited.')
    })

    Livewire.on('editedWithdrawal', (e) => {
        toastr.success('Withdrawal edited.')
    })

    Livewire.on('editedDeposit', (e) => {
        toastr.success('Deposit edited.')
    })

    Livewire.on('editedInvestment', (e) => {
        toastr.success('Investment edited.')
    })

    Livewire.on('deletedWithdrawal', (e) => {
        toastr.success('withdrawal deleted.')
    })

    Livewire.on('deletedInvestment', (e) => {
        toastr.success('investment deleted.')
    })

    Livewire.on('deletedDeposit', (e) => {
        toastr.success('Deposit deleted.')
    })

    Livewire.on('deletedFiatWithdrawal', (e) => {
        toastr.success('Fiat Withdrawal deleted.')
    })

    Livewire.on('addedDownline', (e) => {
        toastr.success('Downline added successfully.')
    })

    Livewire.on('addedRefincome', (e) => {
        toastr.success('Referral income added.')
    })

    Livewire.on('addedPromo', (e) => {
        toastr.success('promo added.')
    })

    Livewire.on('addedUserWallet', (e) => {
        toastr.success('member wallet added.')
    })

    Livewire.on('deletedUserWallet', (e) => {
        toastr.success('member wallet deleted.')
    })

    Livewire.on('editedUserWallet', (e) => {
        toastr.success('member wallet edited.')
    })

    Livewire.on('subApproved', (e) => {
        toastr.success('Bot subscription approved.')
    })

    Livewire.on('editedSubscription', (e) => {
        toastr.success('Bot subscription was updated.')
    })

    Livewire.on('subDeleted', (e) => {
        toastr.success('Bot subscription was deleted.')
    })

    Livewire.on('addedUserSub', (e) => {
        toastr.success('Bot subscription was created.')
    })
</script>
