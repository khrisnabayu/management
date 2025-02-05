@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">

    <div class="card mb-4">
        <div class="card-header">Invoice Records Customer</div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice No.</th>
                            <th>Date Registration</th>
                            <th>Customer</th>
                            <th>Phonenumber</th>
                            <th>Address</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($invoice_customer as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">INVC_{{ $rs->id }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->date_registration)->format('M d, Y') }}</td>
                            <td class="align-middle">
                                @foreach($customer as $cs)
                                    @if($cs->id == $rs->id_customer)
                                        {{$cs->name}}                            
                                    @endif
                                @endforeach   
                            </td>
                            <td class="align-middle">
                                @foreach($customer as $cs)
                                    @if($cs->id == $rs->id_customer)
                                        {{$cs->phonenumber}}                            
                                    @endif
                                @endforeach   
                            </td>
                            <td class="align-middle">
                                @foreach($customer as $cs)
                                    @if($cs->id == $rs->id_customer)
                                        {{$cs->address}}                            
                                    @endif
                                @endforeach   
                            </td>
                            <td class="align-middle"><a class="btn btn-success btn-xs text-white" href="#" data-toggle="modal" data-target="#detailcheckups-{{$rs->id}}">Detail Checkups</a></td>
                            <!-- Modal -->
                            <div class="modal fade" id="detailcheckups-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Checkups</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-4">
                                            <div class="card-header">Tooth Checkups</div>
                                            <div class="card-body">
                                                <div class="datatable">
                                                @foreach( $toothcheckup as $tc )
                                                    @if( $tc->id_invoice == $rs->id )
                                                        @foreach ( $toothservice as $ts )
                                                            @if ( $ts->id == $tc->id_service )
                                                            <p><i data-feather="check-circle"></i> Service : {{ $ts->name }}
                                                            @endif
                                                        @endforeach 
                                                        - Quantity : {{ $tc->quantity }}</p>                         
                                                    @endif
                                                @endforeach 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-4">
                                            <div class="card-header">Medicine Checkups</div>
                                            <div class="card-body">
                                            <div class="datatable">
                                                @foreach( $medicinecheckup as $mc )
                                                    @if( $mc->id_invoice == $rs->id )
                                                        @foreach ( $medicineservice as $ms )
                                                            @if ( $ms->id == $mc->id_service )
                                                            <p><i data-feather="check-circle"></i> Service : {{ $ms->name }}
                                                            @endif
                                                        @endforeach 
                                                        - Quantity : {{ $mc->quantity }}</p>                          
                                                    @endif
                                                @endforeach 
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection