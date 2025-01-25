<x-admin-layout>
    <x-admin-nav></x-admin-nav>
    <x-admin-sidebar></x-admin-sidebar>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Fake Transaction</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a
                                    href="{{ route('admin.faketransaction.index') }}">Back</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Fake Transaction</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="mx-2"> @include('inc.messages')</div>
                                <!-- form start -->
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('admin.faketransaction.update', [$faketran->id]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Investor Name</label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                name="name" value="{{ old('name') ?? $faketran->name }}" required>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="amount">Amount</label>
                                            <input type="number" size="0.01" id="amount"
                                                class="form-control  @error('amount') is-invalid @enderror"
                                                name="amount"value="{{ old('amount') ?? $faketran->amount }}"
                                                required>
                                            @error('amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="currency">Asset</label>
                                            <input type="text" id="currency"
                                                class="form-control  @error('currency') is-invalid @enderror"
                                                name="currency"value="{{ old('currency') ?? $faketran->currency }}"
                                                required>
                                            @error('currency')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="transaction">Transaction type(must be one of deposit or
                                                withdrawal)</label>
                                            <select name="transaction" class="form-control" id="">
                                                <option value="">Choose...</option>
                                                <option value="deposit"
                                                    @if ($faketran->transaction === 'deposit') {{ 'selected' }} @endif>Deposit
                                                </option>
                                                <option
                                                    value="withdrawal"@if ($faketran->transaction === 'withdrawal') {{ 'selected' }} @endif>
                                                    Withdrawal</option>
                                            </select>
                                            @error('transaction')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fake_created_at">Transacted on</label>
                                            <input type="date" id="fake_created_at"
                                                class="form-control  @error('fake_created_at') is-invalid @enderror"
                                                name="fake_created_at"
                                                value="{{ old('fake_created_at') ?? $faketran->created_at }}" required>
                                            @error('fake_created_at')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="img">Investor Image</label>
                                            <input type="file" id="img"
                                                class="form-control  @error('img') is-invalid @enderror" name="img">
                                            <p><sub>Maximum size:2mb</sub></p>
                                            @error('img')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update fake transaction</button>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
        </section>
    </div><x-admin-footer></x-admin-footer>
</x-admin-layout>
