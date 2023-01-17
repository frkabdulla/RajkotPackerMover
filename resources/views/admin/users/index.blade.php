@extends($adminTheme)

@section('title')
	User
@endsection

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>User</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">            
              <div class="col-md-6 col-6">
                <h3 class="card-title mt-2">User List</h3>
              </div>
              <div class="col-md-6 col-6 text-right">
                <a href="{{ route('users.create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus pr-1"></i> Create User</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped data-table">
              <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="115px">Action</th>
                  </tr>
              </thead>
              <tbody>
              	
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('script')

<script>
$(function () {

    var table = $('.data-table').DataTable({
    	rowReorder: {
            selector: 'td:nth-child(2)'
        },
    	responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "fnDrawCallback": function() {
            jQuery('.toggle').bootstrapToggle();
        }
    });

    $.fn.dataTable.ext.errMode = 'throw';
});

  // $('body').on('change','.change-status',function () {
  // var status = $(this).prop('checked') == true ? '0' : '1';
  // var id = $(this).data('id');
  // var url = 'user/change-status/'+id;
  //     $.ajax({
  //         url: url,
  //         method: "POST",
  //         data: {_token:token,status:status},
  //         success: function(data){
  //             toastr.success('User Status Updated successfully.');
  //         }
  //     });
  // });
</script>
@endsection