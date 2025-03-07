<div class="card">
    <div class="card-header">
      <h3 class="card-title">Subscriptions Management</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 300px;">
          <input type="text" class="form-control float-right border-none" style="background-color:#edf2f7 "
          placeholder="filter by investor or bot or wallet" wire:model="search">
          @if ($search!=='')
          <button wire:click="clear" class="px-2"><i class="fa fa-times" aria-hidden="true"></i></button>            
          @endif
        </div>           
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">          
      <div class="input-group input-group-sm mb-2" style="width: 150px;">
        <a href="/admin/subscriptions/create" class="btn btn-block btn-primary btn-sm">Add new</a>
      </div> 
      @include('inc.messages')        
      <table class="table table-hover table-head-fixed  text-nowrap">
        <thead>
          <tr>                                 
            <th>Investor</th>
            <th>Bot</th>
            <th>Price</th>
            <th>Multiplier</th>
            <th>Wallet</th>
            <th>Days left</th>
            <th>Status</th>
            <th>Created</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if (count($subscriptions)>0)
            @foreach ($subscriptions as $sub)
              <tr>                           
                <td>{{$sub->user->name}}<a href="{{route('admin.user.show',[$sub->user_id])}}" class="ml-3 underline">See more</a></td>                                  
                <td>{{$sub->bot}}</td>
                <td>${{$sub->price}}</td>
                <td>{{$sub->multiplier}}</td>
                <td>{{$sub->wallet}}</td>
                <td>{{$sub->days_left}}</td>
                <td>
                    @php
                        switch($sub->status){
                            case 'active':
                                $color = 'green';
                                break;
                            case 'pending':
                                $color = 'yellow';
                                break;
                            case 'expired':
                                $color = 'rose';
                                break;
                            case 'suspended':
                                $color = 'gray';
                                break;
                            default:
                                $color = 'yellow';
                                break;
                        }
                    @endphp
                    <span class="text-{{$color}}-600 font-semibold">{{$sub->status}}</span>
                </td>
                <td>{{$sub->created_at->diffForHumans()}}</td>                
                <td class="flex flex-nowrap justify-center items-center">
                  <div class="flex items-center">
                    <button type="button" data-toggle="dropdown" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                      </svg>                      
                    </button>
                    <ul class="dropdown-menu left-4"> 
                      @if ($sub->status == 'pending')
                          <li><button wire:click="approve('{{$sub->id}}')" type="button" class="dropdown-item flex justify-start items-center">
                            <span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                            </span>
                            <span class="font-semibold">APPROVE</span>
                        </button> </li>                          
                      @endif                                         
                      <li><button wire:click='$emit("openModal","admin.edit-subscription",@json([$sub->id]))'
                        class="dropdown-item flex justify-start items-center"><span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        </span>
                        <span class="font-semibold">EDIT</span></button></li>                       
                      <li><button wire:click="delete('{{$sub->id}}')" type="button" class="dropdown-item flex justify-start items-center">
                        <span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        </span><span class="font-semibold">DELETE</span>
                      </button></li>
                    </ul>
                  </div>                                                                          
                </td>                                    
              </tr>                           
            @endforeach       
          @endif                                    
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
