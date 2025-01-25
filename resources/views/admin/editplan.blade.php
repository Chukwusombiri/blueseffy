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
            <h1 class="m-0">Investment Plan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.plans')}}">Back</a></li>
              
              <li class="breadcrumb-item active">plan</li>
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
              <h3 class="card-title">Update Plan</h3>
            </div>
            <!-- /.card-header -->    
            <div class="card-body">
                <div class="mx-2"> @include('inc.messages')</div>
            <!-- form start -->
            <form method="POST" action="{{route('admin.plan.update',[$plan->id])}}">
                @csrf
                @method('PATCH')
                <div class="form-row">                                                 
                  <div class="form-group col-md-6">
                    <label for="name">Plan Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')??$plan->name}}" required>                    
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>        
                  <div class="form-group col-md-6">
                    <label for="interest">Interest rate (%)</label>
                    <input type="number" id="interest" size="0.01" class="form-control  @error('interest') is-invalid @enderror" name="interest"value="{{old('interest')??$plan->interest}}" required>
                        @error('interest')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="min">Minimum Amount($)</label>
                    <input type="number" id="min" class="form-control  @error('min') is-invalid @enderror" name="min"value="{{old('min')??$plan->min}}" required>
                        @error('min')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="max">Maximum Amount($)</label>
                    <input type="number" id="max" class="form-control  @error('max') is-invalid @enderror" name="max"value="{{old('max')??$plan->max}}" required>
                        @error('max')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="duration">Duration (hours)</label>
                    <input type="number" id="duration" class="form-control  @error('duration') is-invalid @enderror" name="duration"value="{{old('duration')??$plan->duration}}" required>
                        @error('duration')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label for="ref_commission">Referral Commission (%)</label>
                    <input type="number" step="0.1" id="ref_commission" class="form-control  @error('ref_commission') is-invalid @enderror" name="ref_commission"value="{{old('ref_commission')??$plan->ref_commission}}" required>
                        @error('ref_commission')
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