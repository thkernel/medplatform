@extends("layouts.dashboard")

@section("content")
<div class="container">
<div class="br-pageheader mg-t-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        
        <span class="breadcrumb-item active"><h5>Logs des activités</h5></span>
      </nav>
    </div><!-- br-pageheader -->
<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="headers mg-b-20">
        <div class="left-content">
        </div>

        <div class="text-right">
            

            

        </div>

    </div>


<table id="datatable" class="table display responsive nowrap">


  <thead>
    <tr>
     <th>Date</th>
      <th>Adresse IP</th>
      <th>Navigateur</th>
      <th>Ressource</th>
      <th>Action</th>
      <th>Utilisateur</th>
     
      
    </tr>
  </thead>

  <tbody class="logs">
    @include("logs/_index")
  </tbody>
</table>

</div>
</div>
</div>
<div id="member-modal" class="c-modal modal fade" data-backdrop="static"></div>

@endsection