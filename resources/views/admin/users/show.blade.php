@extends($adminTheme)

@section('title')
	User Show
@endsection

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>User Show</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
          <li class="breadcrumb-item active">User Show</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
    	<div class="container-fluid">
      	<div class="row">
        		<div class="col-md-12">
        			<div class="card">
          			<div class="card-body">
		              	<div class="table-responsive">
			                <table class="table table-bordered  ">
			                  <tr>
                            <td width="200px"><b>Name</b></td>    
                            <td>{{ $user->name }}</td>    
                        </tr>
                        <tr>
                            <td width="200px"><b>Email</b></td>    
                            <td>{{ $user->email }}</td>    
                        </tr>
                        <tr>
                            <td width="200px"><b>Type</b></td>    
                            <td>
                              @if($user->is_admin)
                                <span class="badge badge-success">Admin</span>
                              @else
                                <span class="badge badge-primary">User</span>
                              @endif
                            </td>    
                        </tr>
<!--                         <tr>
                            <td width="200px"><b>Image</b></td>    
                            <td>
                              @if($user->google_id == null)
                                <img src="{{ !empty($user->profile) ? route('image.asset.storage.file',['folder' => 'userImage', 'file' => $user->profile]) : asset('adminTheme/dist/img/AdminLTELogo.png') }}" class="img-thumbnail" style="height: 150px; width: 150px;">
                              @else
                                <img src="{{ !empty($user->profile) ? $user->profile : asset('adminTheme/dist/img/AdminLTELogo.png') }}" class="img-thumbnail" style="height: 150px; width: 150px;">
                              @endif
                            </td>    
                        </tr> -->
			                </table>
			            </div>
          			</div>
        			</div>
        		</div>
       	</div>
      </div>
  </section>
@endsection