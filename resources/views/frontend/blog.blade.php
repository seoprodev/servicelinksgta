@extends('frontend.partials.master')
@section('title', 'Home')
@push('styles')
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Blogs</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-01.png') }}" class="breadcrumb-bg-1" alt="">
                <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-02.png') }}" class="breadcrumb-bg-2" alt="">
            </div>
        </div>
    </div>

    <div class="page-wrapper bg-white">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    @foreach($blogs as $blog)
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="img-sec w-100 blog-list-img">
                                        <a href="{{ route('front.blog.detail', $blog->slug) }}">
                                            <img src="{{ asset($blog->image) }}"
                                                 class="img-fluid rounded-top w-100"
                                                 alt="{{ $blog->title }}">
                                        </a>
{{--                                        <div class="image-tag d-flex justify-content-end align-items-center">--}}
{{--                                            <span class="trend-tag">{{ $blog->category ?? 'Uncategorized' }}</span>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="d-flex align-items-center border-end pe-2">
                                <span class="avatar avatar-sm me-2">
                                    <img src="{{ asset('frontend-assets/img/user-default.jpg') }}"
                                         class="rounded-circle" alt="user">
                                </span>
                                                <h6 class="fs-14 text-gray-6">{{ $blog->author->name ?? 'Admin' }}</h6>
                                            </div>
                                            <div class="d-flex align-items-center ps-2">
                                                <span><i class="ti ti-calendar me-2"></i></span>
                                                <span class="fs-14">{{ $blog->created_at->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="fs-16 text-truncate mb-1">
                                                <a href="{{ route('front.blog.detail', $blog->slug) }}">
                                                    {{ $blog->title }}
                                                </a>
                                            </h6>
                                            <p class="two-line-ellipsis fs-14">
                                                {{ Str::limit(strip_tags($blog->content), 200) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
