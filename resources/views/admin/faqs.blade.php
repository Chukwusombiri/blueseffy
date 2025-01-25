<x-admin-layout>
    <x-admin-nav></x-admin-nav>
    <x-admin-sidebar></x-admin-sidebar>
      <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">FAQs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">FAQs</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-12 mb-3 d-block text-right">                
                <a href="{{route('admin.faqs.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> create faq</a></div>
                <div class="col-10 mx-3">@include('inc.messages')</div>
            <div class="col-12" id="accordion">
                @if ($faqs && count($faqs)>0)
                    @foreach ($faqs as $faq)
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                            <div class="card-header d-flex">
                                <h4 class="card-title">
                                    {{$faq->question}}
                                </h4>
                                <div class="text-right d-flex">
                                    <a class="btn btn-info btn-sm mr-2" href="{{route('admin.faqs.edit',[$faq->id])}}">                                       
                                        Edit
                                    </a>
                                    <form method="POST" action="{{route('admin.faqs.destroy',[$faq->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            {{ __('DELETE') }}
                                        </button>                                  
                                    </form>
                                </div>
                            </div>
                        </a>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                {{$faq->answer}}
                            </div>
                        </div>
                    </div>           
                    @endforeach   
                @else
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header d-flex">
                            <h4 class="card-title w-100">
                                NO RECORDS
                            </h4>
                            
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            You don't have FAQS
                        </div>
                    </div>
                </div>              
                @endif
            </div>
        </div>
        </section>
        <!-- /.content -->
</div>
<x-admin-footer></x-admin-footer>
</x-admin-layout>
