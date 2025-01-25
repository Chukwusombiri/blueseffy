<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>          
          <th>Amount</th>
          <th>Plan</th>
          <th>Wallet</th>                       
          <th>created</th>
          <th>Status</th>                       
          <th>Action</th>                       
        </tr>
      </thead>
      <tbody>
        @if (count($investments)>0)
          @foreach ($investments as $investment)
              <tr>                  
                  <td>${{$investment->amount}}</td>
                  <td>{{$investment->plan->name}}</td>
                  <td>{{$investment->wallet->name ?? 'Funding Wallet'}}</td>
                  <td>{{ date('M d, Y', strtotime($investment->created_at))}}</td>                                   
                  <td>
                    @if ($investment->is_approved)
                        <span class="badge badge-success">Approved</span>
                    @else
                        <span class="badge badge-warning">Pending</span>
                    @endif 
                  </td>
                  <td class="flex flex-nowrap justify-center items-center">    
                    <div class="flex items-center">
                      <button type="button" data-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>                      
                      </button>
                      <ul class="dropdown-menu left-4"> 
                        @if (!$investment->is_approved)
                            <li><button wire:click="approve('{{$investment->id}}')" type="button" class="dropdown-item flex justify-start items-center">
                              <span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                              </svg>
                              </span>
                              <span class="font-semibold">APPROVE</span>
                          </button> </li>                          
                        @endif
                        @if ($investment->receipt != null)
                        <li><a  href="{{ asset('storage/'.$investment->receipt) }}" target="_blank" class="dropdown-item flex justify-start items-center">
                          <span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185zM9.75 9h.008v.008H9.75V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 4.5h.008v.008h-.008V13.5zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                          </svg>
                          </span>
                          <span class="font-semibold">RECEIPT</span></a></li>
                        @endif                       
                        <li><button wire:click='$emit("openModal","admin.edit-investment",@json([$investment->id]))'
                          class="dropdown-item flex justify-start items-center"><span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg>
                          </span>
                          <span class="font-semibold">EDIT</span></button></li>                       
                        <li><button wire:click="delete('{{$investment->id}}')" type="button" class="dropdown-item flex justify-start items-center">
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
      <div class="p-2">{{$investments->links()}}</div>
    </table>
  </div>
  <!-- /.card-body -->