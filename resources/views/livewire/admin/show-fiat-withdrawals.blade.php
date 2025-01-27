<div class="card">
    <div class="card-header">
      <h3 class="card-title">fiat withdrawals</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 300px;">
          <input type="text" class="form-control float-right border-none" style="background-color:#edf2f7 "
          placeholder="filter by account details or bank or routing number" wire:model="search">
          @if ($search!=='')
          <button wire:click="clear" class="px-2"><i class="fa fa-times" aria-hidden="true"></i></button>            
          @endif
        </div>   
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
      <div class="input-group input-group-sm mb-3" style="width: max-content;">
        <a wire:click='$emit("openModal","admin.add-fiat-withdrawal")'
         class="btn btn-block btn-primary btn-sm">create new</a>
      </div>
      @include('inc.messages')   
       <table class="table table-hover table-head-fixed text-nowrap">
         <thead>
           <tr>                       
             <th>Investor</th>
             <th>Amount</th>
             <th>Account no</th>
             <th>Account name</th> 
             <th>Bank name</th>  
             <th>Routing no</th>                
             <th>Transacted</th>
             <th>Status</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
             @if (count($withdrawals)>0)
                @foreach ($withdrawals as $withdrawal)
                 <tr>                  
                     <td>{{$withdrawal->user->name}}
                       <a class="mr-3 underline" href="{{route('admin.user.show',[$withdrawal->user_id])}}">See more</a></td>
                     @if($withdrawal->created_at > auth()->user()->last_sign_out_at)
                       <td>${{$withdrawal->amount}} <span class="badge badge-danger ml-2">new</span></td>
                     @else 
                       <td>${{$withdrawal->amount}}</td>
                     @endif                                          
                     <td>{{$withdrawal->account_no}}</td>
                     <td>{{$withdrawal->account_name}}</td>
                     <td>{{$withdrawal->bank_name}}</td>
                     <td>{{$withdrawal->routing_no}}</td>
                     <td>{{$withdrawal->created_at->diffForHumans()}}</td>
                     <td>
                       @if ($withdrawal->is_approved)
                           <span class="badge badge-success">Approved</span>                              
                       @else
                           <span class="badge badge-warning">pending</span> 
                       @endif
                     </td>
                     <td class="d-flex">
                       @if ($withdrawal->is_approved)
                         <a wire:click='$emit("openModal","admin.edit-fiat-withdrawal",@json([$withdrawal->id]))'
                          class="btn  btn-sm btn-primary mr-3">EDIT</a>
                       @else                       
                          <button wire:click="approve('{{$withdrawal->id}}')" type="button"  class="btn btn-sm btn-secondary mr-3">
                              {{ __('APPROVE') }}
                          </button>                                                         
                       @endif                                                   
                          <button wire:click="delete('{{$withdrawal->id}}')" type="button" class="btn btn-sm btn-danger">
                              {{ __('DELETE') }}
                          </button>                                                       
                     </td>                                        
                 </tr>  
                @endforeach                 
             @endif                                 
         </tbody>
         <div class="p-2">{{$withdrawals->links()}}</div>
       </table>
     </div>
    <!-- /.card-body -->
  </div>