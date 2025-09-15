@extends('frontend.user.partials.master')
@push('styles')
@endpush
@section('title', 'Dashboard')
@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
        <h4 class="mb-3 real-label">Dashboard</h4>
        <div class="row mb-1">
            <div class="col-md-6">
                <div class="card dash-widget">
                    <div class="card-body">
                        <div class="d-flex  justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                            <span class="dash-icon bg-primary-transparent d-flex justify-content-center align-items-center rounded-circle">
                                                <i class="ti ti-shopping-cart"></i>
                                            </span>
                                <div class="ms-2">
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <span class="fs-14 real-label">Total Orders</span>
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <h5 class="real-label"><span class="counter totalOrder">1</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dash-widget">
                    <div class="card-body">
                        <div class="d-flex  justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                            <span class="dash-icon bg-secondary-transparent d-flex justify-content-center align-items-center rounded-circle">
                                                <i class="ti ti-wallet"></i>
                                            </span>
                                <div class="ms-2">
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <span class="fs-14 real-label">Total Spend</span>
                                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                                    <h5 class="real-label"><span class="symbol">$</span><span class="counter totalSpend">30.00</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-xxl-6 col-lg-6 d-flex">
                <div class="w-100">
                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                    <h5 class="mb-3 real-label">Recent Transaction</h5>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody class="recentTranction">
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="dash-icon-1 bg-gray d-flex justify-content-center align-items-center rounded-circle avatar avatar-lg me-2">
                                           <img src="{{ asset('frontend-assets/img/profile-default.png') }}" class="rounded-circle img-fluid" alt="Img">
                                        </span>
                                        <div>
                                            <h6 class="fs-14">General plumbin...</h6>
                                            <span class="text-gray fs-12">
                                                <i class="feather-calendar"></i>
                                                Aug 30, 2025
                                                <span class="ms-2">
                                                    <i class="feather-clock"></i>
                                                    02:23 AM
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <h6>$30</h6>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="/user/transaction" id="view-transaction-btn" class="btn border d-block view-transaction-btn">View All</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6 d-flex">
                <div class="w-100">
                    <div class="skeleton label-skeleton label-loader" style="display: none;"></div>
                    <h5 class="mb-3 real-label">Recent Booking</h5>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody class="recent_booking">
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-lg me-2">
                                            <img src="{{ asset('frontend-assets/img/profile-default.png') }}" class="img-fluid" alt="img">
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="fs-14">Sink fix</h6>
                                                <span class="text-gray fs-12">
                                                    <i class="feather-calendar me-1"></i>
                                                    Aug 30, 2025
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-lg me-2">
                                            <img src="{{ asset('frontend-assets/img/profile-default.png') }}" class="rounded-circle img-fluid" alt="Img">
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="fs-14">Clientthree</h6>
                                                <span class="text-gray fs-14">clientthree@gmail.co...</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="/user/bookinglist" id="view-transaction-btn" class="btn border d-block view-transaction-btn">View All</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush