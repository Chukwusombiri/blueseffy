<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>                       
          <th>Amount</th>
          <th>Referred</th>                        
          <th>created</th>                     
        </tr>
      </thead>
      <tbody>
        @if (count($refincomes)>0)
              @foreach ($refincomes as $refincome)
                  <tr>                                                                      
                      <td>${{$refincome->amount}}</td>
                      <td>{{$refincome->downline->name}}</td>
                      <td>{{date('M d, Y',strtotime($refincome->created_at))}}</td>                                                                                                                                                               
                  </tr>                             
              @endforeach                                                                  
        @endif
      </tbody>
      <div class="p-2">{{$refincomes->links()}}</div>
    </table>
  </div>