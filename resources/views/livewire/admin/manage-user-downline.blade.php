<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>                       
          <th>Name</th>
          <th>Email</th>
          <th>Joined</th>                                                                                       
        </tr>
      </thead>
      <tbody>
        @if (count($downlines)>0)
              @foreach ($downlines as $downline)
                  <tr>                                                                                                          
                      <td>{{$downline->name}} 
                        <a href="{{route('admin.user.show',[$downline->id])}}" class="inline-block pl-2 underline">See more</a>
                     </td> 
                      <td><button wire:click='$emit("openModal", "admin.send-mail", @json([$downline]))'>
                        <i class="fa fa-envelope" aria-hidden="true"></i> <span class="underline">{{$downline->email}}</span></button></td>
                      <td>{{ date('M d, Y', strtotime($downline->created_at))}}</td>                                                                                                                                         
                  </tr>                             
              @endforeach                                                                  
        @endif
      </tbody>
    </table>
  </div>