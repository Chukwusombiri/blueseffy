<div class="mycontainer">            
    <div class="mb-20">
        <span class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold mb-7">My Wallets</span>
        <h2 class="text-center text-dark text-2xl capitalize mx-auto md:w-1/2">How To Add New Wallet</h2>
    </div>
    <div class="pb-3">
        <p class="text-slate-900 text-xl font-bold">Start withdrawing your investment Returns into one of these wallets:</p>
        <ul role="list" class="space-y-4 py-4 text-slate-600">
            <li><i class="las la-check-square"></i> Select Add Wallet.</li>                    
            <li><i class="las la-check-square"></i> Enter Wallet Name</li>
            <li><i class="las la-check-square"></i> Enter Wallet Address</li>
            <li><i class="las la-check-square"></i> And Submit Form</li>                    
        </ul>
        <a onclick='Livewire.emit("openModal","admin.add-user-wallet",@json([$user]))' class="flex flex-nowrap justify-start items-center bg-indigo-400 text-white px-4 py-2 rounded-md mt-4 w-max"
          ><i class="las la-plus"></i> Add Wallet</a>                
    </div>
   
    <div id="profile">                                    
        <h2 class="mt-20 mb-7 text-xl text-slate-900 font-extrabold">My Wallets</h2>              
        <div class="card" style="border-top: 1px solid #000;margin-top: 20x">
            <div class="card-header">
                <h3>
                    Wallets Management
                </h3>                       
            </div>                    
            <div class="card-body table-responsive">
               
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>                               
                        <th>Added</th>
                        <th>Action</th>                                                                      
                      </tr>
                    </thead>
                    <tbody>      
                        @foreach ($wallets as $w=>$wallet)                                 
                            <tr class="hover:bg-slate-200">
                                <td>{{$w+1}}</td>
                                <td>{{$wallet->name}}</td>
                                <td>{{$wallet->address}}</td>                                                                   
                                <td>{{ date('M d, Y', strtotime($wallet->created_at))}}</td>                                            
                                <td><a href="javascript:void(0)"  onclick='Livewire.emit("openModal","admin.edit-user-wallet",@json([$wallet]))' class="btn btn-secondary mybtn">EDIT</a></td>
                                <td><a href="javascript:void(0)" wire:click="deleteWallet('{{$wallet->id}}')" class="btn btn-primary mybtn">DELETE</a></td>
                            </tr>                                                                                            
                        @endforeach                                                                                                   
                    </tbody>
                  </table>                                                                         
            </div>
        </div>                     
    </div>
</div>