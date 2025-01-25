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
            <h1 class="m-0">Deposit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.deposits')}}">Back</a></li>
              
              <li class="breadcrumb-item active">deposit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="row">
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Deposit</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <!-- form start -->
            @include('inc.messages')
            <form method="POST" action="{{route('admin.deposit.store')}}">
                @csrf
                <div class="form-row">                 
                  <div class="form-group col-md-6">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                    id="amount" name="amount" value="{{old('amount')}}" required>

                        @error('amount')
                          <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
                        @enderror
                  </div>                 
                  <div class="form-group col-md-6">
                    <label for="user_id">Investor</label>
                    <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                      <option  @if(old('user_id') === ''){{'selected'}} @endif>Choose...</option>
                      @if (count($users)>0)
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" @if(old('user_id') === $user->id){{'selected'}} @endif>{{$user->name}}</option>    
                        @endforeach                                             
                      @else
                        <option value=""><a href="{{route('admin.user.create')}}">No Investor. add investors.</a></option>
                      @endif                                                           
                    </select>
                    @error('user_id')
                      <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
                    @enderror
                  </div>
                 
                  <div class="form-group col-md-6">
                    <label for="company_wallet_id">Deposit Wallet</label>
                    <select id="company_wallet_id" name="wallet_id" class="form-control @error('wallet_id') is-invalid @enderror" required>
                      <option  @if(old('wallet_id') === ''){{'selected'}} @endif>Choose...</option>
                      @if (count($wallets)>0)
                        @foreach ($wallets as $wallet)
                            <option value="{{$wallet->id}}" @if(old('wallet_id') === $wallet->id){{'selected'}} @endif>{{$wallet->name}}</option>    
                        @endforeach                                             
                      @else
                        <option value=""><a href="{{route('admin.company_wallet.create')}}">No Wallest. add new wallets?</a></option>
                      @endif                                                           
                    </select>
                        @error('wallet_id')
                          <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100">Create Deposit</button>
                  </div>                   
                </div>
              </form>
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
