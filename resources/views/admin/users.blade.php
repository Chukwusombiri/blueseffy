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
                        <h1 class="m-0">Members Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>

                            <li class="breadcrumb-item active">member</li>
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
                        @livewire('admin.show-users')
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
    <x-admin-footer></x-admin-footer>
</x-admin-layout>
<script>
    Livewire.on('userUpdated', (e) => {
        toastr.success('Member updated successful')
    })

    Livewire.on('sentMail', (e) => {
        toastr.success('Mail sent successful')
    })

    Livewire.on('deletedMember', (e) => {
        toastr.success('Member deleted successful')
    })

    Livewire.on('resetedPassword', (e) => {
        toastr.success('Member password changed')
    })

    Livewire.on('resumedTrade', (e) => {
        toastr.success('Member earnings resumed')
    })
    Livewire.on('pausedTrade', (e) => {
        toastr.success('Member earnings paused')
    })

    Livewire.on('verifiedUser', (e) => {
        toastr.success('Account verified')
    })
</script>
