@extends("layouts.dashboard")

@section("content")
<div class="container">
<div class="br-pageheader mg-t-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h5>Licences d'exploitation</h5></span>
      </nav>
    </div><!-- br-pageheader -->
<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="headers mg-b-20">
        <div class="left-content">
        </div>

        <div class="text-right">
            
          @if (current_user()->isDoctor() && count(current_user()->userable->business_license) <= 0)
            <a class="btn btn-primary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1" href="{{ route('business_licenses.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Ajouter
            </a>
          @endif
          

        </div>

    </div>


<table id="datatable" class="table display responsive nowrap">


  <thead>
    <tr>
      <th>Date</th>
      <th>Référence</th>
      <th>Année</th>
     <th>Médecin</th>
      
     
      
      <th>Actions</th>
    </tr>
  </thead>

  <tbody class="business-licenses">
    @include("business_licenses/_index")
  </tbody>
</table>

</div>
</div>
</div>
<div id="member-modal" class="c-modal modal fade" data-backdrop="static"></div>

@endsection