<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>                      
          <th>Name</th>
          <th>Amount</th>                                             
          <th>Date</th>                                              
        </tr>
      </thead>
      <tbody>
        @if (count($promos)>0)
            @foreach ($promos as $promo)
                <tr>                                    
                    <td>{{$promo->name}}</td>                                    
                    <td>${{$promo->amount}}</td>                                                                       
                    <td>{{ date('M d, Y', strtotime($promo->created_at))}}</td>                                                                                                    
                </tr>                             
            @endforeach                                                                
        @endif
      </tbody>
      <div class="p-2">{{$promos->links()}}</div>
    </table>
  </div>