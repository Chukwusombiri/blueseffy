<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>         
          <th>Amount</th>
          <th>Wallet</th>
          <th>Address</th> 
          <th>Status</th>                       
          <th>Created</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          @if (count($withdrawals)>0)
             @foreach ($withdrawals as $withdrawal)
              <tr>                  
                  <td>${{$withdrawal->amount}}</td>
                  <td>{{$withdrawal->userWallet->name}}</td>
                  <td>{{$withdrawal->userWallet->address}}</td>
                  <td>{{ date('M d, Y', strtotime($withdrawal->created_at))}}</td>                               
                  <td>
                      @if ($withdrawal->is_approved)
                          <span class="badge badge-success">Approved</span>
                      @else
                          <span class="badge badge-warning">Pending</span>
                      @endif 
                  </td>
                  <td class="d-flex">           
                      @if ($withdrawal->is_approved)
                        <a wire:click="$emit('openModal','admin.edit-withdrawal',{{ json_encode(['id' => $withdrawal->id]) }} )" class="btn  btn-sm btn-primary mr-3">EDIT</a>                                                                    
                      @else                                                      
                        <button wire:click="approve('{{$withdrawal->id}}')" type="button" class="btn btn-sm btn-secondary mr-3">
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