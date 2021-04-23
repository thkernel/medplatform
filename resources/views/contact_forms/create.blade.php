@extends("layouts.front")

@section("gmaps")




    <script>
      // Initialize and add the map
      function initMap() {
        // The location 
        const location = { lat: {{ organization()->latitude }}, lng: {{ organization()->longitude }} };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: location,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: location,
          map: map,
        });
      }
    </script>



@endsection


@section("content")
<div class="container main-container">

<div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h3>Contactez-nous</h3></span>
      </nav>
    </div><!-- br-pageheader -->

<div class="br-pagebody mg-b-30">
  <div class="br-section-wrapper">
    <div class="headers mg-b-5">
      

    </div>
    <div class="section-body">
      <div class="row">

        <div class="col-md-7"> 
          <h3>Nous écrire</h3>
          <hr />
    		  @include("contact_forms/_form")
        </div>
        <div class="col-md-5"> 
          <h3>Adresses</h3>
          <hr />


          <div class="addresses">
            <h6 class="">Téléphone: {{ organization()->phone_1 }} / {{ organization()->phone_2 }}</h6>
            <h6 class="">Fax: {{ organization()->fax}} </h6>
            <h6 class="">BP: {{ organization()->po_box}}</h6>
            <h6 class="">Email: {{ organization()->address}}</h6>
            <h6 class="">Adresses: {{ config('global.company_addresses')}}</h6>
          </div>
              
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div id="map"></div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
@include("layouts/partials/_ckeditor")