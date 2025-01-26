<div class="card">
  <div class="card-header">
    <h3 class="card-title">Members</h3>

    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 200px;">
        <input type="text" class="form-control float-right border-none" style="background-color:#edf2f7 "  placeholder="Search name or email" wire:model="search">
        @if ($search!=='')
          <button wire:click="clear" class="px-2"><i class="fa fa-times" aria-hidden="true"></i></button>            
        @endif
      </div>
    </div>
  </div>
  <!-- ./card-header -->
  <div class="card-body table-responsive">
    <div class="d-flex justify-content-between mb-2">
      <div>
        <button class="btn btn-md btn-info rounded-pill" wire:click="$emit('openModal','admin.add-member')">Add member</button>
      </div>
      <div class="d-flex gap-3">             
        <select wire:model="date"  class="border-none outline-none bg-info rounded">                   
          <option value="asc">Sort by: Oldest</option>
          <option value="desc">Sort by: Newest</option>                        
        </select>
    </div>                            
    </div>      
    <table class="table table-hover table-head-fixed text-nowrap">
      <thead>
        <tr>
          <th>#</th>
          <th>Member</th>         
          <th>Registered</th> 
          <th>Last seen</th>                   
          <th>state</th> 
          <th>status</th>            
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $u => $user)
          @if (!$user->is_admin)
          <tr>
            <td>{{$u+1}}</td>
            <td>{{$user->name}} <br>
              <button class="underline" wire:click="$emit('openModal', 'admin.send-mail', {{ json_encode(['id' => $user->id])}} )'>
              <i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}</button></td>                          
            <td>{{date('M d, Y',strtotime($user->created_at))}}</td>  
            <td>{{date('M d, Y',strtotime($user->last_sign_out_at))}}</td>               
            <td><span class="py-1 px-2 rounded-full bg-@if($user->is_banned){{'red-100'}}@else{{'green-100'}}@endif">
              {{$user->is_banned ? 'Banned' : 'Not Banned'}}
            </span></td>    
            <td><span class="py-1 px-2 rounded-full bg-indigo-100">
              @if ($user->is_paused)
                {{__('Trading Paused')}}
              @else
                @switch($user->status)
                     @case('earning')
                         {{'ACTIVE TRADING'}}
                         @break
                     @case('not_earning')
                        {{'TRADING SESSION COMPLETED'}}
                        @break
                    @case('dormant')
                        {{'DORMANT'}}
                        @break
                    @case('active')
                        {{'YET TO TRADE'}}
                        @break                    
                 @endswitch
              @endif
             
            </span></td>                         
            <td class="d-flex">                
                <div>
                  <a href='{{route('admin.user.edit',[$user->id])}}' class="border-0 rounded-pill px-2 pb-1 btn-info">view</a>
                  <button class="border-0 rounded-pill px-3" type="button" data-toggle="dropdown" aria-expanded="false" >
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                  </button>
                  <ul class="dropdown-menu left-4"> 
                    <li><a class="dropdown-item" href="/admin/users/{{$user->id}}"><i class="fa fa-list" aria-hidden="true"></i> Activity</a></li>
                    @if (! $user->hasVerifiedEmail())
                    <li><button class="dropdown-item" wire:click="verify('{{$user->id}}')"><i class="fa fa-check" aria-hidden="true"></i> Verify user</button></li>
                    @endif                    
                    @if ($user->status=='earning')
                      @if ($user->is_paused)
                      <li><button class="dropdown-item" wire:click="$emit('openModal','admin.resume-trade',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-unlock" aria-hidden="true"></i> resume trade</a></li>                         
                      @else
                      <li><button class="dropdown-item" wire:click="$emit('openModal','admin.pause-trade',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-lock" aria-hidden="true"></i> pause trade</a></li>                           
                      @endif                    
                    @endif
                    <li><button class="dropdown-item" wire:click="$emit('openModal','admin.reset-password',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-key"></i> Password</button></li>                                           
                    @if ($user->is_banned)
                        <li><button class="dropdown-item" wire:click="$emit('openModal','admin.unban',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-undo" aria-hidden="true"></i> Un-Ban</button></li>
                    @else
                        <li><button class="dropdown-item"  wire:click="$emit('openModal','admin.ban',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-ban" aria-hidden="true"></i> Ban</button></li>
                    @endif
                    <li><button class="dropdown-item" wire:click="$emit('openModal','admin.delete-member',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-user-times" aria-hidden="true"></i> Delete</button></li>
                    <div class="dropdown-divider"></div> 
                    @if ($user->is_admin)
                      <li><button class="dropdown-item" wire:click="$emit('openModal','admin.remove-admin',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-unlock"></i> remove admin</button></li>
                    @else
                      <li><button class="dropdown-item" wire:click="$emit('openModal','admin.make-admin',{{ json_encode(['id' => $user->id])}})"><i class="fa fa-lock"></i> Make admin</button></li>  
                    @endif
                  </ul>
                </div>                  
            </td>
        </tr>   
          @endif         
        @endforeach                        
      </tbody>
    </table>
    {{$users->links()}}
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->