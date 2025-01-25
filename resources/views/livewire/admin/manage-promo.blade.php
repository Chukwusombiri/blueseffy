<div class="card">
    <div class="card-header">
      <h3 class="card-title">Promo Management</h3>   
      <div class="card-tools d-flex">
        <div class="input-group input-group-sm d-flex" style="width: max-content;">
            <a onclick='Livewire.emit("openModal","admin.fund-all-promo")'
            class="btn btn-primary btn-sm mr-2">Fund All</a>
            <a href="{{route('admin.promo.create')}}" class="btn btn-primary btn-sm">Fund Investor</a>
        </div>
      </div>      
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
     @include('inc.messages')
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>  
            <th>Investor</th>             
            <th>Name</th>               
            <th>Amount</th>                
            <th>Date</th>
            <th>Action</th>                
          </tr>
        </thead>
        <tbody>
            @if (count($promos)>0)
               @foreach ($promos as $promo)
                <tr>  
                    <td>{{$promo->user->name}}
                      <a href="{{route('admin.user.show',[$promo->user->id])}}" class="ml-3 underline">See more</a>
                    </td>                      
                    <td>{{$promo->name}}</td>                      
                    <td>${{$promo->amount}}</td>                                                
                    <td>{{date('M d, Y',strtotime($promo->updated_at))}}</td>                        
                    <td><button wire:click="delete('{{$promo->id}}')" class="btn btn-danger">Delete</button></td>                        
                </tr>  
               @endforeach               
            @endif                                 
        </tbody>  
        <div class="p-2">{{$promos->links()}}</div>          
      </table>
    </div>
    <!-- /.card-body -->
  </div>