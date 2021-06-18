@extends('layout.header')

@section('content')
    <!-- content -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Cars</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Cars</h1>
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
                         <p align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCars">
                          Add Cars
                        </button></p>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                             <div class="table-responsive">
                            <table class="table table-striped b-t b-b" id="tableok">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th>Vendor Name</th>
                                        <th>Name Of Car</th>
                                        <th>Tyoe Of Car</th>
                                        <th>Model</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($cars as $car)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$car->vendor->name_vendor}}</td>
                                    <td>{{$car->name_car}}</td>
                                    <td>{{$car->type_car}}</td>
                                    <td>{{$car->model}}</td>
                                    <td>{{number_format($car->day_price)}}</td>
                                    <td>
                                                    <button 
                                                        class="btn btn-info btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#Editcar-{{$car->id}}">
                                                    Edit
                                                    </button>
                                                    <button 
                                                        class="btn btn-danger btn-sm" 
                                                        data-toggle="modal"
                                                        data-target="#Deletecar-{{$car->id}}">
                                                    Delete
                                                    </button>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                             <div class="table-responsive">
                        </div>
                    </div>
                </div><!-- /.panel-->
    </div>  <!--/.main-->

     <!-- The Modal -->
  <div class="modal" id="AddCars">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New car</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form role="form" action="{{url('car_add')}}" method="POST" enctype="multipart/form-data">
                @csrf
         <div class="row">
        <div class="col-md-6">
            <label>Car Name</label>
            <input required class="form-control" name="name_car">
        </div>

       <div class="col-md-6">
            <label>Vendor Name</label>
            <select style="width: 100%" class="form-control js-example-basic-single" name="vendor_id">
              <option value="0">Choose Vendor</option>
                @foreach($vendors as $vd)
                <option value="{{$vd->id}}">{{$vd->name_vendor}}</option>
                @endforeach
            </select>
        </div>
      </div>

       <div class="row">
         <div class="col-md-6">
            <label>Type Of Car</label>
            <select style="width: 100%" class="form-control js-example-basic-single" name="type_car">
              <option value="0">Choose Type Of Car</option>
               <option value="Matic">Matic</option>
               <option value="Manual">Manual</option>
            </select>
        </div>

         <div class="col-md-6">
            <label>Doors</label>
            <input required class="form-control" name="doors" >
        </div>
      </div>

       <div class="row">
       <div class="col-md-6">
            <label>Seats</label>
            <input required class="form-control" name="seats" >
        </div>

         <div class="col-md-6">
            <label>Image Of Car <small style="color: red">Recomended size height 366px width 650px</small> </label>
            <input required type="file" class="form-control" name="img_car">
        </div>
      </div>

       <div class="row">
         <div class="col-md-6">
            <label>Model</label>
            <input required type="text" class="form-control" name="model" >
        </div>

         <div class="col-md-6">
            <label>First Registration</label>
            <input required type="date" class="form-control" name="fisrt_registartion"
             >
        </div>
    </div>

     <div class="row">
         <div class="col-md-6">
            <label>Millage</label>
            <input required type="text" class="form-control" name="millage">
        </div>

         <div class="col-md-6">
            <label>Fuel</label>
            <input required type="text" class="form-control" name="fuel"
             >
        </div>
    </div>

     <div class="row">
         <div class="col-md-6">
            <label>Egine Size</label>
            <input required type="text" class="form-control" name="engine_size" >
        </div>

         <div class="col-md-6">
            <label>Power</label>
            <input required type="text" class="form-control" name="power"
             >
        </div>
    </div>

    <div class="row">
         <div class="col-md-6">
            <label>Color</label>
            <input required type="text" class="form-control" name="color" >
        </div>

         <div class="col-md-6">
            <label>Price</label>
            <input required type="text" class="form-control" name="day_price"
             >
        </div>
    </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   @foreach($cars as $car)
   <div class="modal" id="Editcar-{{$car->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit car</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" action="{{url('car_update/'.$car->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
         <div class="row">
        <div class="col-md-6">
            <label>Car Name</label>
            <input required class="form-control" value="{{$car->name_car}}" name="name_car" placeholder="Car Name">
        </div>

        <div class="col-md-6">
            <label>Vendor Name</label>
            <select style="width: 100%" class="form-control js-example-basic-single" name="vendor_id">
              <option value="0">Choose Vendor</option>
                @foreach($vendors as $vd)
                <option value="{{$vd->id}}"
                {{ $car->vendor->id == $vd->id ? 'selected' : '' }}>{{$vd->name_vendor}}</option>
                @endforeach
            </select>
        </div>
      </div>

       <div class="row">
         <div class="col-md-6">
            <label>Type Of Car</label>
            <select style="width: 100%" class="form-control js-example-basic-single" name="type_car">
              <option value="0">Choose Type Of Car</option>
               <option value="Matic" {{ $car->type_car == 'Matic' ? 'selected' : '' }}>Matic</option>
               <option value="Manual" {{ $car->type_car == 'Manual' ? 'selected' : '' }}>Manual</option>
            </select>
        </div>

        <div class="col-md-6">
            <label>Doors</label>
            <input required class="form-control" name="doors" placeholder="Doors" value="{{$car->doors}}">
        </div>
      </div>

       <div class="row">
        <div class="col-md-6">
            <label>Seats</label>
            <input required class="form-control" name="seats" placeholder="Seats"  value="{{$car->seats}}">
        </div>

          <div class="col-md-6">
            <label>Image Of Car <small style="color: red">Recomended size height 366px width 650px</small></label>
            <input type="file" class="form-control" name="img_car">
            <input type="hidden" name="old_img_car" value="{{$car->img_car}}">

            <label>If Have Been Change Imgae , click update For see update item!</label>
            <img src="{{$car->img_car}}" style="width: 30%">
        </div>
      </div>

       <div class="row">
         <div class="col-md-6">
            <label>Model</label>
            <input required type="text" class="form-control" value="{{$car->model}}" name="model" >
        </div>

         <div class="col-md-6">
            <label>First Registration</label>
            <input required type="date" class="form-control" value="{{$car->fisrt_registartion}}" name="fisrt_registartion"
             >
        </div>
    </div>

     <div class="row">
         <div class="col-md-6">
            <label>Millage</label>
            <input required type="text" class="form-control" value="{{$car->millage}}" name="millage">
        </div>

         <div class="col-md-6">
            <label>Fuel</label>
            <input required type="text" class="form-control" value="{{$car->fuel}}" name="fuel"
             >
        </div>
    </div>

     <div class="row">
         <div class="col-md-6">
            <label>Egine Size</label>
            <input required type="text" class="form-control" value="{{$car->engine_size}}" name="engine_size" >
        </div>

         <div class="col-md-6">
            <label>Power</label>
            <input required type="text" class="form-control" value="{{$car->power}}" name="power"
             >
        </div>
    </div>

    <div class="row">
         <div class="col-md-6">
            <label>Color</label>
            <input required type="text" class="form-control" value="{{$car->color}}" name="color" >
        </div>

         <div class="col-md-6">
            <label>Price</label>
            <input required type="text" class="form-control" value="{{$car->day_price}}" name="day_price"
             >
        </div>
    </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="submit" class="btn btn-info">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
    </form>
      </div>
    </div>
  </div>

     <div class="modal" id="Deletecar-{{$car->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete car</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <h5>Are you sure you want to delete data, if the data is deleted it will also delete data related to this data! this action cannot be canceled</h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <a href="{{url('car_delete/'.$car->id)}}" class="btn btn-info">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   @endforeach
@endsection
