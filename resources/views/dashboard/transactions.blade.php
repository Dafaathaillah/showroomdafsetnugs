@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Transactions</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Transactions</h1>
            </div>
        </div><!--/.row-->

        @if($message=Session::get('success'))
        <div class="alert bg-teal" role="alert">
            <em class="fa fa-lg fa-check">&nbsp;</em> 
           {{$message}}
        </div>
        @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th>Code Transaction</th>
                                        <th>Name Of Customers</th>
                                        <th>Name Of Car</th>
                                        <th>Amount</th>
                                        <th>Order date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($transactions as $car)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$car->code_transaction}}</td>
                                    <td>{{$car->user->name}}</td>
                                    <td>{{$car->car->name_car}}</td>
                                    <td>{{number_format($car->amount)}}</td>
                                    <td>{{$car->transaction_date}}</td>
                                    <td>
                                     {{$car->status_transaction}}
                                    </td>
                                    <td>
                                      @if($car->status_transaction=='process')
                                      <a title="View" class="btn btn-success btn-sm" data-toggle="modal" 
                                                    data-target="#waiting-{{$car->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    </a>
                                      @elseif($car->status_transaction=='agree')
                                        <a title="View" class="btn btn-success btn-sm" data-toggle="modal" 
                                                    data-target="#agree-{{$car->id}}">
                                                    <i class="fa fa-check"></i>
                                                    </a>
                                      @else
                                       <a title="View" class="btn btn-success btn-sm" data-toggle="modal" 
                                                    data-target="#refuse-{{$car->id}}">
                                                    <i class="fa fa-check"></i>
                                                    </a>
                                      @endif
                                    </td>
                                </tr>
                                @php $no++; @endphp

                                <div class="modal" id="waiting-{{$car->id}}">
                                  <div class="modal-dialog ">
                                    <div class="modal-content">
                                    <div class="modal-footer">
                                        <a onclick="return confirm('are you sure approve this transaction')" class="btn btn-success" href="{{url('transaction_action/'.$car->id.'/'.'agree')}}">Approve</a>
                                        <a onclick="return confirm('are you sure refuse this transaction')" class="btn btn-warning"href="{{url('transaction_action/'.$car->id.'/'.'refuse')}}">Refuse</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Action for this transaction</h4>
                                      </div>   
                                       <div class="modal-body">
                                      </div>
                                      <!-- Modal footer -->
                                    </div>
                                  </div>
                                </div>

                                 <div class="modal" id="agree-{{$car->id}}">
                                  <div class="modal-dialog ">
                                    <div class="modal-content">
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Status Transaction</h4>
                                      </div>   
                                       <div class="modal-body">
                                       <p>This transaction have been approved at {{$car->updated_at}}</p>
                                      </div>
                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                      <!-- Modal footer -->
                                    </div>
                                  </div>
                                </div>

                                 <div class="modal" id="refuse-{{$car->id}}">
                                  <div class="modal-dialog ">
                                    <div class="modal-content">
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Status Transaction</h4>
                                      </div>   
                                       <div class="modal-body">
                                       <p>This transaction have been refused at {{$car->updated_at}}</p>
                                      </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                      <!-- Modal footer -->
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.panel-->
    </div>  <!--/.main-->
@endsection
