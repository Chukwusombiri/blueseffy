<div id="profile" class="mycontainer">                     
    <h2 class="mt-20 mb-7 text-xl text-slate-900 font-extrabold">Withdrawal History</h2>   
    <div class="card" style="border-top: 1px solid #000;margin-top: 20x">
        <div class="card-header">
            <h3>
                My Fiat Withdrawal Transactions
            </h3>                       
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                  <tr>                                
                    <th>Amount</th>
                    <th>Account NO</th>
                    <th>Account Name</th>                                
                    <th>Bank Name</th>                                
                    <th>Routing NO</th>                                
                    <th>Transacted</th>
                    <th>Status</th>                                                                      
                  </tr>
                </thead>
                <tbody>                            
                    @foreach ($withdrawals as $w=>$withdrawal)
                        <tr class="hover:bg-slate-200">
                            <td>${{$withdrawal->amount}}</td>
                            <td>{{$withdrawal->account_no}}</td>
                            <td>{{$withdrawal->account_name}}</td>
                            <td>{{$withdrawal->bank_name}}</td>
                            <td>{{$withdrawal->routing_no}}</td>                                                       
                            <td>{{ date('M d, Y', strtotime($withdrawal->created_at))}}</td>
                                @if ($withdrawal->is_approved)
                                    <td><span class="text-success">Approved</span></td>
                                @else
                                    <td><span class="text-warning">Pending</span></td>
                                @endif                                                        
                        </tr>                                
                    @endforeach                                                                                   
                </tbody>
                <div class="p-2">{{$withdrawals->links()}}</div>
              </table>                                      
        </div>
    </div>                     
</div>    