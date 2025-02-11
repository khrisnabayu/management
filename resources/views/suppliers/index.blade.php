@extends('layouts.app')
  
@section('contents')

<div class="container mt-5">

    <nav class="nav nav-borders">
        <a class="nav-link ml-0" href="#">Blog Article</a>
        <a class="nav-link active" href="#">Blog Category</a>
    </nav>
    <hr class="mt-0 mb-4" />

    <form action="{{ route('suppliers.filter') }}" method="GET">
    <div class="form-row">
        <div class="col-md-2">
            <div class="form-group">
                <input class="form-control" name="start_date" type="date" placeholder="Date" id="dateFrom" value="{{ $start_date }}" required/>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <input class="form-control" name="end_date" type="date" placeholder="Date" id="dateTo" value="{{ $end_date }}" required/>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" name="id_medicinestock" >
                <option value="0">All</option>
                    @foreach($medicinestock as $rs)
                        <option <?php if ( $id_medicinefilter == $rs->id) { echo 'selected'; }?> value="{{ $rs->id }}">{{ $rs->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <button class="btn btn-primary m-0" type="submit">Search</button>
            </div>
        </div>
    </div>
    </form>
    
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Supplier Management Data</div>
        <div class="card-header">

            <!-- Create Data -->

            <div class="dropdown">
        
                <a class="btn btn-primary text-white mt-2"  data-toggle="modal" data-target="#modalCreate">Create Supplier Data</a>
                <a class="btn btn-success text-white mt-2 dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action Data</a>
                <div class="dropdown-menu dropdown-lg" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('print.excelpdf') }}" target="_blank">Print</a>
                    <a class="dropdown-item" href="{{ route('suppliers.exportexcel') }}">Export All Data Excel</a>
                    <form id="selectedForm" action="{{ route('suppliers.selected') }}" method="POST">
                        @csrf
                        <input type="hidden" id="selectedIDs" name="markId" required>
                        <button class="btn btn-transparent-black btn-sm dropdown-item text-black" type="submit" >Export Selected Data to Excel</button>
                    </form>
                </div>
            </div>

            <!-- Create Data -->
            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltest">Create Supplier Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="currentName" style="color: #69707A">Name</label>
                            <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" required/>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputPhonenumber" style="color: #69707A">Phonenumber</label>
                                    <input class="form-control" name="phonenumber" id="inputPhonenumber" type="number" placeholder="Enter phonenumber" required />

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputAddress" style="color: #69707A">Address</label>
                                    <input class="form-control" name="address" id="inputAddress" type="text" placeholder="Enter address" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputDateRegistration" style="color: #69707A">Date Registration</label>
                                    <input class="form-control" name="date_registration" id="dateRegis" type="date" placeholder="Enter date registration" required/>
                                    <script>
                                        var date = new Date();
                                        var day = date.getDate();
                                        var month = date.getMonth() + 1;
                                        var year = date.getFullYear();
                                        if (month < 10) month = "0" + month;
                                        if (day < 10) day = "0" + day;
                                        var today = year + "-" + month + "-" + day;
                                        document.getElementById('dateRegis').value = today;
                                    </script>
                                    

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputPrice" style="color: #69707A">Price</label>
                                    <input class="form-control" name="price" id="inputPrice" type="number" placeholder="Enter price" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentDescription" style="color: #69707A">Description</label>
                            <input class="form-control" name="description" id="currentDescription" type="text" placeholder="Enter Your Description" required/>
                        </div>
                      
                        <div class="form-group">
                            <input class="form-control" name="id_company" id="currentIdCompany" type="hidden" value="{{ auth()->user()->company_id }}"/>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary m-0" type="submit">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- List Data -->
        </div>
        <div class="card-body">
            <div class="datatable">

                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mark Id</th>
                            <th>Name</th>
                            <th>Date Registration</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Phonenumber</th>
                            <th>Price</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($supplier as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle"><input type="checkbox" name="rowSelect" value="{{ $rs->id }}"></td>
                            <td class="align-middle">{{ $rs->name }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->date_registration)->format('M d, Y') }}</td>
                            <td class="align-middle">{{ $rs->description }}</td>
                            <td class="align-middle">{{ $rs->address }}</td>
                            <td class="align-middle">{{ $rs->phonenumber }}</td>
                            <td class="align-middle">Rp. {{ number_format($rs->price) }}</td> 
                            <!-- <td class="align-middle">{{ $rs->id_medicinestock}}</td>  -->
                            @foreach($medicinestock as $rd)
                                @if($rs->id_medicinestock == $rd->id)
                                <td class="align-middle">{{ $rd->name }}</td>
                                @endif
                            @endforeach
                            <td>
                                <!-- Edit Data -->
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#edit-{{$rs->id}}"><i data-feather="edit"></i></a>
                                
                                <!-- Modal Edit Data-->
                                <div class="modal fade" id="edit-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Supplier Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('suppliers.update', $rs->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentName">Name</label>
                                                        <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $rs->name }}" />
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="currentPhonenumber">Phonenumber</label>
                                                                <input class="form-control" name="phonenumber" id="currentPhonenumber" type="text" placeholder="Enter Your Phonenumber" value="{{ $rs->phonenumber }}" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="currentAddress">Address</label>
                                                                <input class="form-control" name="address" id="currentAddress" type="text" placeholder="Enter Your Address" value="{{ $rs->address }}"  />
                                                            </div>
                                                                
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="currentDateRegistration">Date Registration</label>
                                                                <input class="form-control" name="date_registration" id="currentDateRegistration" type="date" placeholder="Enter Your Phonenumber" value="{{ Carbon\Carbon::parse($rs->date_registration)->format('Y-m-d') }}" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="currentPrice">price</label>
                                                                <input class="form-control" name="price" id="currentPrice" type="number" placeholder="Enter Your Price" value="{{ $rs->price }}"  />
                                                            </div>
                                                                
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentDescription">Description</label>
                                                        <input class="form-control" name="description" id="currentDescription" type="text" placeholder="Enter Your Description" value="{{ $rs->description }}" />
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" name="id_company" id="currentIdCompany" type="hidden" placeholder="Enter Your Company Id" value="{{ auth()->user()->company_id }}"/>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary m-0" type="submit">Save</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Delete Data -->
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#delete-{{$rs->id}}"><i data-feather="trash-2"></i></a>
                                <!-- Modal Delete Data -->
                                <div class="modal fade" id="delete-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">Are sure delete this data ?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('suppliers.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-primary p-0" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-primary m-0">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr class="mt-2 mb-4" />
            <p align="right"><b>Total : Rp. {{ number_format($summary) }}</b></p>
        </div>





    </div>

    <div class="card mb-4">
        <div class="card-header">List Data Export</div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Path</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($exportdata as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->date_time }}</td>
                            <td class="align-middle">{{ $rs->path }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Javascript Selected Data Export -->
    <script>
        // Function to collect selected data from checkboxes
        function getSelectedData() {
            // Select all checked checkboxes with name="rowSelect"
            let selectedCheckboxes = document.querySelectorAll('input[name="rowSelect"]:checked');
            
            // Arrays to hold the selected ID and Name values
            let selectedIDs = [];
            let selectedNames = [];
            
            // Loop through each selected checkbox and collect its ID and Name
            selectedCheckboxes.forEach(function(checkbox) {
                selectedIDs.push(checkbox.value); // Collect ID from checkbox value
                selectedNames.push(checkbox.getAttribute('data-name')); // Collect Name from data-name attribute
            });
            
            // Return an object containing the arrays of selected IDs and Names
            return { ids: selectedIDs, names: selectedNames };
        }

        // Function to update the new form with selected values
        function updateFormWithSelectedData() {
            // Get the selected data
            let selectedData = getSelectedData();

            // Update the input fields in the new form with the selected data
            document.getElementById('selectedIDs').value = selectedData.ids.join(', ');  // Display selected IDs
            document.getElementById('selectedNames').value = selectedData.names.join(', ');  // Display selected Names
            document.getElementById("exportForm").submit();
          
        }

        // Add event listeners to all checkboxes to handle changes dynamically
        document.querySelectorAll('input[name="rowSelect"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', updateFormWithSelectedData); // Call function when checkbox is selected or deselected
        });
    </script>



</div>
@endsection