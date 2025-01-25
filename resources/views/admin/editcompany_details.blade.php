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
            <h1 class="m-0">Company Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.company_details')}}">Back</a></li>
              
              <li class="breadcrumb-item active">company</li>
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
              <h3 class="card-title">Update Details</h3>
            </div>
            <!-- /.card-header -->    
            <div class="card-body">
                @include('inc.messages')
            <!-- form start -->
            <form method="POST" action="{{route('admin.company_details.update',[$company->id])}}">
                @csrf
                @method('PATCH')
                <div class="form-row">                                                 
                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')??$company->name}}" required>                    
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>        
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email"value="{{old('email')??$company->email}}" required>
                        @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="tel">Phone</label>
                    <input type="text" id="tel" class="form-control  @error('tel') is-invalid @enderror" name="tel"value="{{old('tel')??$company->tel}}" required>
                        @error('tel')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" id="address" class="form-control  @error('address') is-invalid @enderror" name="address"value="{{old('address')??$company->address}}" required>
                        @error('address')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="headoffice">Head Office</label>
                    <input type="text" id="headoffice" class="form-control  @error('headoffice') is-invalid @enderror" name="headoffice"value="{{old('headoffice')??$company->headoffice}}" required>
                        @error('headoffice')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                   
                  <div class="form-group col-md-6">
                    <label for="other_office">Other Office</label>
                    <input type="text" id="other_office" class="form-control  @error('other_office') is-invalid @enderror" name="other_office"value="{{old('other_office')??$company->other_office}}" required>
                        @error('other_office')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                                                           
                  <div class="form-group col-md-6">
                    <label for="active_accounts">Number of Registrations</label>
                    <input type="number" id="active_accounts" class="form-control  @error('active_accounts') is-invalid @enderror" name="active_accounts"value="{{old('active_accounts')??$company->active_accounts}}" required>
                        @error('active_accounts')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="daily_transactions">Daily Transactions</label>
                    <input type="number" id="daily_transactions" class="form-control  @error('daily_transactions') is-invalid @enderror" name="daily_transactions"value="{{old('daily_transactions')??$company->daily_transactions}}" required>
                        @error('daily_transactions')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="deposits">Number of Deposits</label>
                    <input type="number" id="deposits" class="form-control  @error('deposits') is-invalid @enderror" name="deposits"value="{{old('deposits')??$company->deposits}}" required>
                        @error('deposits')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="withdrawals">Number of Withdrawals</label>
                    <input type="number" id="withdrawals" class="form-control  
                    @error('withdrawals') is-invalid @enderror" name="withdrawals"
                    value="{{old('withdrawals')??$company->withdrawals}}" required>
                        @error('withdrawals')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>  
                  <div class="form-group col-md-6">
                    <label for="about_us">About us</label>
                    <textarea type="text" id="about_us" class="form-control  
                    @error('about_us') is-invalid @enderror" name="about_us" rows="7">
                    {{old('about_us')??$company->about_us}}
                    </textarea>
                        @error('about_us')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>  
                  <div class="form-group col-md-6">
                    <label for="vision">Vision</label>
                    <textarea type="text" id="vision" class="form-control  @error('vision') is-invalid 
                    @enderror" name="vision" rows="5" required>{{old('vision')??$company->vision}}
                    </textarea>
                        @error('vision')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mission">Mission</label>
                    <textarea type="text" id="mission" class="form-control  @error('mission') is-invalid 
                    @enderror" name="mission" rows="5" required>{{old('mission')??$company->mission}}
                    </textarea>
                        @error('mission')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="phrase">Slogan</label>
                    <textarea type="text" id="phrase" class="form-control  @error('phrase') is-invalid 
                    @enderror" name="phrase" rows="5" required>{{old('phrase')??$company->phrase}}
                    </textarea>
                        @error('phrase')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>                                         
                </div>                          
                <button type="submit" class="btn btn-primary">save</button>
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
