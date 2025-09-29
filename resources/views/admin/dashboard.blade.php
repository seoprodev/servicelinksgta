@extends('admin.partials.master')

@push('styles')
  @endpush

@section('main-content')
  <div class="main-content">
    <section class="section">
      <div class="row ">
        <!-- New Jobs -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">New Jobs</h5>
                      <h2 class="mb-3 font-18">{{ $newJobs }}</h2>
                      <p class="mb-0"><span class="col-green">Today</span></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="{{ asset('admin-assets/img/banner/1.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Customers -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">Customers</h5>
                      <h2 class="mb-3 font-18">{{ $customers }}</h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="{{ asset('admin-assets/img/banner/2.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tickets -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">Tickets</h5>
                      <h2 class="mb-3 font-18">{{ $tickets }}</h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="{{ asset('admin-assets/img/banner/3.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Revenue -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">Revenue</h5>
                      <h2 class="mb-3 font-18">${{ number_format($revenue, 2) }}</h2>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="{{ asset('admin-assets/img/banner/4.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Job Chart</h4>
            </div>
            <div class="card-body">
              <div id="job-chart" class="chartsh"></div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Subscription Chart</h4>
            </div>
            <div class="card-body">
              <div id="subscription-chart" class="chartsh"></div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Revenue Chart</h4>
            </div>
            <div class="card-body">
              <div id="revenue-chart" class="chartsh"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('admin-assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <script>
    function monthName(num) {
      const months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
      return months[num - 1];
    }
    var jobStats = @json($jobStats);
    new ApexCharts(document.querySelector("#job-chart"), {
      chart: { type: 'area', height: 250 },
      series: [{ name: 'Jobs', data: jobStats.map(d => d.total) }],
      xaxis: { categories: jobStats.map(d => d.date) }
    }).render();

    var subscriptionStats = @json($subscriptionStats);
    new ApexCharts(document.querySelector("#subscription-chart"), {
      chart: { type: 'bar', height: 250 },
      series: [{ name: 'Subscriptions', data: subscriptionStats.map(d => d.total) }],
      xaxis: { categories: subscriptionStats.map(d => monthName(d.month)) }
    }).render();

    var revenueStats = @json($revenueStats);

    console.log(revenueStats);
    new ApexCharts(document.querySelector("#revenue-chart"), {
      chart: { type: 'area', height: 250 },
      series: [{ name: 'Total Revenue', data: revenueStats.map(d => d.total) }],
      xaxis: { categories: revenueStats.map(d => d.total) }
    }).render();
  </script>
@endpush
