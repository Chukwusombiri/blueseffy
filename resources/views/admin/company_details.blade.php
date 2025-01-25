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
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Company Details</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>  
                                  <tr>
                                    <th></th>
                                    <th></th>  
                                  </tr>                         
                                </thead>
                                <tbody>
                                    <tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>
                                                {{$company->name}}
                                            </td>                                         
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$company->email}}</td>
                                           
                                        </tr>
                                        
                                        <tr>
                                          <th>Phone</th>
                                          <td>{{$company->tel}}</td>
                                         
                                      </tr>

                                      <tr>
                                        <th>Address</th>
                                        <td>{{$company->address}}
                                        </td>
                                       
                                    </tr>                                    
                                      <tr>
                                        <th>Head Office</th>
                                        <td>{{$company->headoffice}}</td>                                      
                                    </tr> 
                                                                                                            
                                    <tr>
                                        <th>Other Offices</th>
                                        <td>{{$company->other_office}}</td>                                      
                                    </tr> 
                                    <tr>
                                        <th>Number of Registrations</th>
                                        <td>{{$company->active_accounts}}</td>                                      
                                    </tr> 
                                    <tr>
                                        <th>Daily Transactions</th>
                                        <td>{{$company->daily_transactions}}</td>                                      
                                    </tr> 
                                    <tr>
                                        <th>Number of Deposits</th>
                                        <td>{{$company->deposits}}</td>                                      
                                    </tr> 
                                    
                                    <tr>
                                        <th>Number of Withdrawals</th>
                                        <td>{{$company->withdrawals}}</td>                                      
                                    </tr> 
                                    <tr>
                                        <th>About Us</th>
                                        <td>{{$company->about_us}}</td>                                      
                                    </tr> 
                                    <tr>
                                        <th>Mission</th>
                                        <td>{{$company->mission}}</td>                                      
                                    </tr> 
                                    <tr>
                                        <th>Vision</th>
                                        <td>{{$company->vision}}</td>                                      
                                    </tr> 
                                      <tr>
                                        <th>Certificate</th>
                                        <td>
                                            @if (!empty($company->certificate))
                                                <a href="{{route('admin.company_details.certificate',[$company->id])}}" class="btn btn-sm btn-primary">Download Certificate</a>
                                                <button onclick='Livewire.emit("openModal","admin.upload-certificate")' class="btn btn-sm btn-primary">change certificate</button>
                                            @else
                                            <button onclick='Livewire.emit("openModal","admin.upload-certificate")' class="btn btn-sm btn-primary">No Certificate uploaded. click to upload. </button>
                                            @endif    
                                        </td>                                       
                                    </tr>
                                    <tr>
                                        <th>Company PDF</th>
                                        <td>
                                            @if (!empty($company->pdf))
                                                <a href="{{route('admin.company_details.pdf',[$company->id])}}" class="btn btn-sm btn-primary">Download PDF</a>
                                                <button onclick='Livewire.emit("openModal","admin.upload-pdf")' class="btn btn-sm btn-primary">Change PDF</button>
                                            @else
                                                <button onclick='Livewire.emit("openModal","admin.upload-pdf")' class="btn btn-sm btn-primary">No PDF uploaded. click to upload. </button>
                                            @endif    
                                        </td>                                       
                                    </tr>
                                                                                                                    
                                        <tr>
                                            <th>Action</th>
                                            <td class="d-flex"><a class="btn btn-sm btn-primary mr-3" href="{{route('admin.company_details.edit',[$company->id])}}">Edit</a>                                              
                                        </tr>
                                    </tr>                                                  
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->       
                </div>
            </div>
        </div>    
    </section>
</div>
<x-admin-footer></x-admin-footer>
</x-admin-layout>
<script>
    Livewire.on('uploadedDocument',(e)=>{
        toastr.success('Document Uploaded');
    })
</script>