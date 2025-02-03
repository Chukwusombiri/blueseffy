<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>                       
          <th>Name</th>
          <th>Address</th> 
          <th>Created</th>                       
          <th>Action</th>                     
        </tr>
      </thead>
      <tbody>
        @if (count($userwallets)>0)
              @foreach ($userwallets as $wallet)
                  <tr>                                                                      
                      <td>{{$wallet->name}}</td>
                      <td>{{$wallet->address}}</td>  
                      <td>{{date('M d, Y',strtotime($wallet->created_at))}}</td>                                                                                                          
                      <td class="d-flex">                                                 
                        <a wire:click="$emit('openModal','admin.edit-user-wallet', {{ json_encode(['id' => $wallet->id]) }} )"
                         class="btn  btn-sm btn-primary mr-3">EDIT</a>                                                                                                                                                                                                     
                        <button wire:click="deleteWallet('{{$wallet->id}}')" class="btn btn-sm btn-danger">
                            {{ __('DELETE') }}
                        </button>                                                                                                                     
                      </td>                                                                                                                                                               
                  </tr>                             
              @endforeach                                                                  
        @endif
      </tbody>
      <div class="p-2">{{$userwallets->links()}}</div>
    </table>
  </div>