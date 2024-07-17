
@extends('backend.partials.master')
@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard">
      <div class="row widget-grid">
            @if (Auth::user()->role === "vendor")
                <div class="col-xl-3 col-md-6 proorder-xl-2 proorder-md-2">
                  <div class="card">
                    <div class="card-header card-no-border pb-0">
                      <div class="header-top">
                        <h4>Total Services</h4>
                      </div>
                    </div>
                    <div class="card-body pb-0 opening-box">
                      <div class="d-flex align-items-center gap-2">
                        <h2 id="ServicesCount">0</h2>
                      </div>
                    </div>
                  </div>
                </div>
            @elseif(Auth::user()->role === "admin")
                <div class="col-xl-3 col-md-6 proorder-xl-2 proorder-md-2">
                  <div class="card">
                    <div class="card-header card-no-border pb-0">
                      <div class="header-top">
                        <h4>Total Categories</h4>
                      </div>
                    </div>
                    <div class="card-body pb-0 opening-box">
                      <div class="d-flex align-items-center gap-2">
                        <h2 id="ServicesCount">0</h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 proorder-xl-2 proorder-md-2">
                  <div class="card">
                    <div class="card-header card-no-border pb-0">
                      <div class="header-top">
                        <h4>Total Vendors</h4>
                      </div>
                    </div>
                    <div class="card-body pb-0 opening-box">
                      <div class="d-flex align-items-center gap-2">
                        <h2 id="VendorsCount">0</h2>
                      </div>
                    </div>
                  </div>
                </div>
            @endif

      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
  @if(Auth::user()->role === "admin")
      <script>

            jQuery(window).on("load",function(){
                    let categoryCountElement = document.getElementById('VendorsCount');
                    let targetCount = {{ $vendor_count }};
                    let currentCount = 0;
                    let increment = 1; // The amount to increment each step
                    let intervalTime = 50; // The time in milliseconds between each increment

                    function updateCounter() {
                        if (currentCount < targetCount) {
                            currentCount += increment;
                            if (currentCount > targetCount) {
                                currentCount = targetCount; // Ensure we don't exceed the target
                            }
                            categoryCountElement.innerText = currentCount;
                            setTimeout(updateCounter, intervalTime);
                        }
                    }

                    updateCounter();

            });
      </script>
    @endif

    @if(Auth::user()->role === "admin" || Auth::user()->role === "vendor")
          <script>



                window.onload = function() {
                    let categoryCountElement = document.getElementById('ServicesCount');
                    let targetCount = {{ $Counter }};
                    let currentCount = 0;
                    let increment = 1; // The amount to increment each step
                    let intervalTime = 50; // The time in milliseconds between each increment

                    function updateCounter() {
                        if (currentCount < targetCount) {
                            currentCount += increment;
                            if (currentCount > targetCount) {
                                currentCount = targetCount; // Ensure we don't exceed the target
                            }
                            categoryCountElement.innerText = currentCount;
                            setTimeout(updateCounter, intervalTime);
                        }
                    }

                    updateCounter();
                };
            </script>
    @endif
@endsection
