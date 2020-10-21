@extends('layouts.app')

@section('content')
<div class="container-fluid max-width">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a><span class="mr-1 ml-1"> > </span> </li>
                <?php $link = "" ?>
                @for($i = 1; $i <= count(Request::segments()); $i++) @if($i < count(Request::segments()) & $i> 0)
                    <?php $link .= "/" . Request::segment($i); ?>
                    <li class="breadcrumb-item"><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a></li> >
                    @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                    @endif
                    @endfor
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary btn-block" id="create-new-product">Add New Employee</button>
                            </div>
                            {{-- Modal add data-toggle="modal" data-target="#exampleModal"--}}
                            <div class="modal fade" id="ajax-product-modal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="productCrudModal"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="productForm" name="productForm" class="form-horizontal">
                                                <input type="hidden" name="product_id" id="product_id">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Title</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Product Code</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Tilte" value="" maxlength="50" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Description</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="laravel_datatable">
                            <thead>
                                <tr>
                                    <th>Name</>
                                    <th>Email</th>
                                    <th>Job Title</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
  var SITEURL = '{{URL::to('/')}}';
  $(document).ready( function () {
  $.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });
  $.fn.dataTable.moment('DD/MM/YYYY HH:mm:ss');
  $('#laravel_datatable').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
  url: "/get_users",
  type: 'GET',
  },
  columns: [
  // { data: 'id', name: 'id', 'visible': false},
  // { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
  { data: 'name', name: 'name' },
  { data: 'email', name: 'email' },
  { data: 'job_title', name: 'job_title' },
  { data: 'department', name: 'description' },
  { data: 'role_id', name: 'role_id' },
  { data: 'created_at', render: $.fn.dataTable.moment('DD/MM/YYYY HH:mm:ss')},
  { data: 'action', name: 'action', orderable: false},
  ],
  order: [[2, 'desc']]
  });
  /*  When user click add user button */
  $('#create-new-product').click(function () {
  $('#btn-save').val("create-product");
  $('#product_id').val('');
  $('#productForm').trigger("reset");
  $('#productCrudModal').html("Add a new employee");
  $('#ajax-product-modal').modal('show');
  });
  /* When click edit user */
  $('body').on('click', '.edit-product', function () {
  var product_id = $(this).data('id');
  $.get('product-list/' + product_id +'/edit', function (data) {
  $('#title-error').hide();
  $('#product_code-error').hide();
  $('#description-error').hide();
  $('#productCrudModal').html("Edit Product");
  $('#btn-save').val("edit-product");
  $('#ajax-product-modal').modal('show');
  $('#product_id').val(data.id);
  $('#title').val(data.title);
  $('#product_code').val(data.product_code);
  $('#description').val(data.description);
  })
  });
  $('body').on('click', '#delete-product', function () {
  var product_id = $(this).data("id");
  if(confirm("Are You sure want to delete !")){
  $.ajax({
  type: "get",
  url: SITEURL + "product-list/delete/"+product_id,
  success: function (data) {
  var oTable = $('#laravel_datatable').dataTable(); 
  oTable.fnDraw(false);
  },
  error: function (data) {
  console.log('Error:', data);
  }
  });
  }
  }); 
  });
  if ($("#productForm").length > 0) {
  $("#productForm").validate({
  submitHandler: function(form) {
  var actionType = $('#btn-save').val();
  $('#btn-save').html('Sending..');
  $.ajax({
  data: $('#productForm').serialize(),
  url: SITEURL + "product-list/store",
  type: "POST",
  dataType: 'json',
  success: function (data) {
  $('#productForm').trigger("reset");
  $('#ajax-product-modal').modal('hide');
  $('#btn-save').html('Save Changes');
  var oTable = $('#laravel_datatable').dataTable();
  oTable.fnDraw(false);
  },
  error: function (data) {
  console.log('Error:', data);
  $('#btn-save').html('Save Changes');
  }
  });
  }
  })
  }
  </script>
@endpush