@extends('layouts.app')

@section('content')
  <div class="container-fluid max-width">
    <div class="main-body">
    
           <!-- Breadcrumb -->
           <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a><span class="mr-1 ml-1"> > </span> </li> 
              <?php $link = "" ?>
              @for($i = 1; $i <= count(Request::segments()); $i++)
                  @if($i < count(Request::segments()) & $i > 0)
                  <?php $link .= "/" . Request::segment($i); ?>
                  <li class="breadcrumb-item"><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a></li> >
                  @else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
                  @endif
              @endfor
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{auth()->user()->profilePicture()}}" alt="Admin" class="rounded-circle" width="150">
                    <p class="font-weight-normal mt-1 mb-0" style="font-size: 15px;">{{Auth::user()->name}}</p>
                    <div class="mt-1">
                      <p class="text-secondary mb-1 font-weight-light">{{Auth::user()->job_title}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <button class="btn btn-success" id="clicker">Edit Profile</button>
                    </div>
                    <div class="col">
                      <button class="btn btn-primary float-right" id="create-new-material">Add Material</button>
                    </div>
                    {{-- Modal add data-toggle="modal" data-target="#exampleModal"--}}
                    <div class="modal fade" id="ajax-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="productCrudModal">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="productForm">
                              <section>
                                <div class="container">
                                  <div class="row justify-content-center">
                                    <div class="col-12 col-md-8 col-lg-8 col-xl-12">
                                      <div class="row align-items-center">
                                        <div class="col mt-1">
                                          <input type="text" class="form-control" placeholder="Company Name">
                                          <input type="hidden" name="product_id" id="product_id">
                                        </div>
                                      </div>
                                      <div class="row align-items-center mt-4">
                                        <div class="col">
                                          <textarea class="form-control" name="description" id="message-text" placeholder="Description here.."></textarea>
                                        </div>
                                      </div>
                                      <div class="row align-items-center mt-4">
                                        <div class="col">
                                          <select class="form-control" name="category">
                                              <option selected disabled>Category</option>
                                              <option value="Female">php</option>
                                              <option value="Male">html</option>
                                          </select>
                                        </div>
                                        <div class="col">
                                          <select class="form-control" name="department">
                                              <option selected disabled>Departmen</option>
                                              <option value="1">IT Department</option>
                                              <option value="2">HR Department</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </section>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- end modal --}}
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col text-secondary">
                      {{Auth::user()->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0">Department</h6>
                    </div>
                    <div class="col text-secondary">
                      {{$employee->department_name ?? ""}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="table-responsive py-4">
                    <table class="table table-flush data-table" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Votes</th>
                                <th>created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Votes</th>
                              <th>created_at</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  
@endsection

@push('js')
<script>
  $(document).ready(function() {
    var SITEURL = '{{URL::to(' / ')}}';
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#datatable-basic').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "/get_material",
          type: 'GET',
      },
      columns: [{
          data: 'material_id',
          name: 'material_id',
          'visible': false
      }, {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
      }, {
          data: 'title',
          name: 'title'
      }, {
          data: 'description',
          name: 'description'
      }, {
          data: 'material_id',
          name: 'material_id'
      }, {
          data: 'created_at',
          name: 'created_at'
      }, {
          data: 'action',
          name: 'action',
          orderable: false
      }, ],
      order: [
          [0, 'desc']
      ]
  });
  /*  When user click add user button */
  $('#create-new-material').click(function() {
      alert("hello");
      $('#btn-save').val("create-product");
      $('#product_id').val('');
      $('#productForm').trigger("reset");
      $('#productCrudModal').html("Add New Material");
      $('#ajax-product-modal').modal('show');
  });
  /* When click edit user */
  $('body').on('click', '.edit-product', function() {
      var product_id = $(this).data('id');
      $.get('product-list/' + product_id + '/edit', function(data) {
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
  $('body').on('click', '#delete-product', function() {
      var product_id = $(this).data("id");
      if (confirm("Are You sure want to delete !")) {
          $.ajax({
              type: "get",
              url: SITEURL + "product-list/delete/" + product_id,
              success: function(data) {
                  var oTable = $('#laravel_datatable').dataTable();
                  oTable.fnDraw(false);
              },
              error: function(data) {
                  console.log('Error:', data);
              }
          });
      }
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
              success: function(data) {
                  $('#productForm').trigger("reset");
                  $('#ajax-product-modal').modal('hide');
                  $('#btn-save').html('Save Changes');
                  var oTable = $('#laravel_datatable').dataTable();
                  oTable.fnDraw(false);
              },
              error: function(data) {
                  console.log('Error:', data);
                  $('#btn-save').html('Save Changes');
              }
          });
      }
  })
  } 
  });
  </script>
@endpush
