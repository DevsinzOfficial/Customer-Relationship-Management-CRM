@extends('masterpage')
@section('title', 'Customer Interactions')
@section('css')

<style>
  .top-right-conner {
      position: fixed;
      top: 8%;
      right: 0;
      z-index: 999;
      /* Ensure it's above other content */
      margin-top: 20px;
      /* Adjust if necessary */
      margin-right: 20px;
      /* Adjust if necessary */
  }
</style>

@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      @if (session()->has('msg'))
      <div class="container" style="z-index: 11;">
          <div class="top-right-conner">

              <div class="toast show bg-success" id="toast"
                  style="background-color:#00AC4A;color:white;font-size:18px;font-weight:800;border:none;">
                  <div class="toast-header bg-light">
                      Message
                      <button type="button" class="btn btn-close" data-bs-dismiss="toast"></button>
                  </div>
                  <div class="toast-body">
                      {{ session()->get('msg') }}
                  </div>
              </div>
          </div>
      </div>
      @endif
      <div class="page-header">
        <h3 class="page-title">Complete Details</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Interactions</li>
            </ol>
        </nav>
      </div>
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Customer Interactions Report</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <div class="form-check form-check-muted m-0">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                          </label>
                        </div>
                      </th>
                      <th> Customer </th>
                      <th> Total Interactions </th>
                      {{-- <th> Total Value </th> --}}
                      {{-- <th> Actions </th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($interactions   as $interaction)
                        <tr>
                        <td>
                            <div class="form-check form-check-muted m-0">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                            </label>
                            </div>
                        </td>
                        <td>{{Str::title($interaction->customer->first_name.' '.$interaction->customer->last_name)}}</td>
                        <td> {{ $interaction->total_interactions }} </td>
                        {{-- <td>
                          <a href="{{ route('admin.pipelines.show', $pipeline->id) }}" class="btn btn-info btn-sm">View</a>
                          <a href="{{ route('admin.pipelines.edit', $pipeline->id) }}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{ route('admin.pipelines.destroy', $pipeline->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') <!-- Spoof the DELETE method -->
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this pipeline?');">Delete</button>
                        </form>
                        </td> --}}
                        </tr>
                        
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
</div>

@endsection

@section('js')

<script>
  const myTimeout = setTimeout(closeAlert, 3000);

  function closeAlert() {
      document.getElementById("toast").style.display = 'none';
  }
</script>

@endsection