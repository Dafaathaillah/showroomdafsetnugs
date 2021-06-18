
   @include('web.header')


    <!-- Page Content -->
    <div class="page-heading about-heading header-text" 
    style="background-image: url(<?php echo url('web/assets/images/heading-6-1920x500.jpg')?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>WELCOME </h4>
              <h2>SHOW ROOM CAR</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
          <div class="col-md-12">
            <div class="row">
              @php $modelT = new App\Models\User(); @endphp
              @foreach($cars as $car)
              @php $data = $modelT->cek_booked($car->id); @endphp
              <div class="col-md-6">
                <div class="product-item">
                <img src="{{$car->img_car}}" alt="">
                  <div class="down-content">
                    <a href="{{url('web/car-details.html')}}"><h4>{{$car->name_car}}</h4></a>

                    <h6><small><b> Price :</b></small> {{number_format($car->day_price)}}</h6>

                    <p>{{$car->model}} &nbsp;/&nbsp; {{$car->power}} &nbsp;/&nbsp; {{$car->fisrt_registartion}} &nbsp;/&nbsp; {{$car->fuel}}</p>

                    <small>
                      <strong title="Author"><i class="fa fa-dashboard"></i> {{$car->millage}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> {{$car->engine_size}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> {{$car->tyoe_car}}</strong>
                    </small>
                  </div>
                  @if($data)
                  @if($data->status_transaction=='process')
                   <p align="right"><a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Booked">Booked</a></p>
                  @elseif($data->status_transaction=='agree')
                    <p align="right"><a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Sold">Sold</a></p>
                  @else
                   <p align="right"><a href="{{url('car_detail/'.$car->id)}}" class="btn btn-info btn-sm">Detail</a></p>
                  @endif
                  @else
                   <p align="right"><a href="{{url('car_detail/'.$car->id)}}" class="btn btn-info btn-sm">Detail</a></p>
                  @endif
                </div>
              </div>
              @endforeach
              <div class="col-md-12">
                <ul class="pages">
                 {{$cars->links()}}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="Booked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">This car have been booked</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
             <p>This car have been booked , and wil bee ready again if the booked before not pay the invoice !</p>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="Sold" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">This car have been sold</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
             <p>This car have been sold</p>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
   @include('web.footer')