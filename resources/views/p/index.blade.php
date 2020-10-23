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
            <div class="col-md-4 mb-3" style="max-width: 25rem;">
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
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="productCrudModal">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data" novalidate>
                                                <input type="hidden" name="product_id" id="product_id">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-8 control-label mb-0">Title</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Material Title" value="" maxlength="150">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-8 control-label mb-0">Description</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" id="description" name="description" placeholder="Write your description here.." maxlength="500" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-8 control-label mb-0">Category</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" name="category_id" id="category_id" style="width: 100%">
                                                            <option selected disabled>Please select a category</option>
                                                            <option value="1" id="php">PHP</option>
                                                            <option value="2" id="Marketing">Marketing</option>
                                                            <option value="3" id="development">development</option>
                                                            <option value="4" id="management">content</option>
                                                            <option value="5" id="design">design</option>
                                                            <option value="6" id="communation">communation</option>
                                                            <option value="7" id="response">response</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-8 control-label mb-0">Department</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" name="department" id="department" style="width: 100%">
                                                            <option selected disabled>Please select a department</option>
                                                            <option value="1" id="de1">IT Department</option>
                                                            <option value="2" id="de2">HR Department</option>
                                                            <option value="3" id="de3">Creative Department</option>
                                                            <option value="4" id="de4">Customer Service</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                  <label for="name" class="col-sm-8 control-label mb-0">File</label>
                                                  <div class="col-sm-12">
                                                      <input type="file" name="material_image" class="form-control" id="material_image" accept=".jpg,.png,.pdf">
                                                  </div>
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-12">
                                                    <button type="submit" class="btn btn-primary btn-block" id="btn-save" value="create">Save
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
                                {{$employee->department_name}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"></h6>
                            <span class="text-secondary"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"></h6>
                            <span class="text-secondary"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 p-0">
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
    $(document).ready(function () {
        $.fn.dataTable.moment('DD/MM/YYYY HH:mm:ss');
        var SITEURL = '{{URL::to('/')}}';
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
                //     data: 'material_id',
                //     name: 'material_id',
                //     'visible': false
                // }, {
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
                data: 'count_votes',
                name: 'count_votes'
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
        $('#create-new-material').click(function () {
            $('#btn-save').val("create-product");
            $('#product_id').val('');
            $('#productForm').trigger("reset");
            $('#productCrudModal').html("Add New Material");
            $('#ajax-product-modal').modal('show');
        });
        /* When click edit user */
        $('body').on('click', '.edit-product', function () {
            var product_id = $(this).data('id');
            $.get('edit_material/' + product_id + '/edit', function (data) {
                $('#title-error').hide();
                $('#product_code-error').hide();
                $('#description-error').hide();
                $('#productCrudModal').html("Edit Product");
                $('#btn-save').val("edit-product");
                $('#ajax-product-modal').modal('show');
                $('#product_id').val(data.material_id);
                $('#title').val(data.title);
                $('.ck p').html(data.description);
                document.getElementById(data.category_name).selected = "true";
                document.getElementById('de' + data.department_id).selected = "true";
                if(data.file){
                  $('#material_image').attr('src', SITEURL +'/public/images/'+data.file);
                }
            })
        });
        
        $('body').on('click', '#delete-product', function () {
            var product_id = $(this).data("id");
            if (confirm("Are You sure want to delete!")) {
                $.ajax({
                    type: "get",
                    url: `/remove_material/${product_id}`,
                    success: function (data) {
                        var oTable = $('#datatable-basic').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    });

    $('body').on('submit', '#productForm', function (e)
    {
    	e.preventDefault();
    	var actionType = $('#btn-save').val();
    	$('#btn-save').html('Sending..');
    	var formData = new FormData(this);
    	$.ajax(
    	{
    		type: 'POST',
    		url: "/add_material",
    		data: formData,
    		cache: false,
    		contentType: false,
    		processData: false,
    		success: (data) =>
    		{
    			$('#productForm').trigger("reset");
    			$('#ajax-product-modal').modal('hide');
    			$('#btn-save').html('Save Changes');
          $('.ck p').html("");
    			var oTable = $('#datatable-basic').dataTable();
    			oTable.fnDraw(false);
    		},
    		error: function (data)
    		{
    			console.log('Error:', data);
    			$('#btn-save').html('Save Changes');
    		}
    	});
    });

    ClassicEditor
        .create(document.querySelector('#description'))
        .catch( error => {
            console.error( error );
        });
</script>
@endpush
