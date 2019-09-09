@extends('layouts.app')
@section('content')
@push('styles')

@endpush
  <!-- Navbar -->
  @include('partials.navbar')

  <div id="wrapper">

    <!-- Sidebar -->
    @include('partials.sidebar')

    <div id="content-wrapper">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Roles</div>
                    <div class="card-body">
                        <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>

                        <form method="GET" action="" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}"> --}}
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" id="userDatatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Blood</th>
                                        <th>Present Address</th>
                                        <th>Permanent Address</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->blood }}</td>
                                        <td>{{ $item->present_address }}</td>
                                        <td>{{ $item->permanent_address }}</td>
                                        <td>
                                            <a href="" title="View Role"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Role" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                            {{-- <div class="pagination-wrapper"> {!! $roles->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    {{-- User Create Form --}}
   
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="createUserModalLabel">Add New User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <span id="form_reult"></span>
                <form id="sample_form" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="text" id="name"  name="name" class="form-control" placeholder="Name" required="required" autofocus="autofocus"value="">
                            <label for="name">Name</label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="text" id="gender" name="gender" class="form-control" placeholder="Gender" required="required">
                            <label for="gender">Gender</label>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of birtd" required="required" autofocus="autofocus">
                                    <label for="dob">Date of birth</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text"id="blood" name="blood" class="form-control" placeholder="Blood" required="required">
                                    <label for="blood">Blood Group</label>
                                </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="father" name="father" class="form-control" placeholder="Father Name" required="required" autofocus="autofocus">
                                    <label for="father">Father Name</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="mother" name="mother" class="form-control" placeholder="Mother Name" required="required">
                                    <label for="mother">Mother name</label>
                                </div>
                                </div>
                            </div>
                    </div>
        
                    <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text"id="present_address"  name="present_address" class="form-control" placeholder="Present Addess" required="required" autofocus="autofocus">
                                    <label for="present_address">Present Address</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="permanent_address"name="permanent_address" class="form-control" placeholder="Permanent Address" required="required">
                                    <label for="permanent_address">Permanent Address</label>
                                </div>
                                </div>
                            </div>
                    </div>
        
                    <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <div class="form-label-group">
                                        <input type="phone"id="phone" name="phone" class="form-control" placeholder="Email address" required="required">
                                        <label for="phone" >Phone</label>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-label-group">
                                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                                        <label for="inputEmail">Email address</label>
                                </div>
                                </div>
                            </div>
                    </div>
        
                    <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-label-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                 <label for="password">Password</label>
                             
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-label-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            <label for="password-confirm">Confirm password</label>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="action" id="action" />
                            <input type="hidden" name="hidden_id" id="hidden_id" />
                            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                        </div>
                    </div>       
                </form>
                </div>
               
              </div>
            </div>
          </div>
     {{-- End User Create Form --}}

    {{-- Edit user Modal --}}
    

    <!-- Sticky Footer -->
    @include('partials.footer')

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
    $(document).ready( function () {
        
            $('#userDatatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajax_all_user') }}",
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "phone" },
                    { "data": "email" },
                    { "data": "gender" },
                    { "data": "blood" },
                    { "data": "present_address" },
                    { "data": "permanent_address" },
                    {"data": "action", orderable: false, searchable: false}
                ]
            });

            $('#create_record').click(function(){
                
                $('.modal-title').text("Add New User");
                $('#action_button').val("Add User");
                $('#action').val("Add");
               $('#createUserModal').modal('show');
            })

            $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == 'Add')
            {
            $.ajax({
                url:"{{route('register_user')}}",
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                success:function(data)
                {
                var html = '';
                if(data.errors)
                {
                html = '<div class="alert alert-danger">';
                for(var count = 0; count < data.errors.length; count++)
                {
                html += '<p>' + data.errors[count] + '</p>';
                }
                html += '</div>';
                }
                if(data.success)
                {
                html = '<div class="alert alert-success">' + data.success + '</div>';
                $('#sample_form')[0].reset();
                $('#userDatatable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
                }
            })
            }

        });
    });
</script>
@endpush
@endsection




