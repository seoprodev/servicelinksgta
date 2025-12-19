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
                    <h2 class="breadcrumb-title mb-2">Blog Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="../index.html"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('frontend-assets') }}/img/bg/breadcrumb-bg-01.png" class="breadcrumb-bg-1" alt="Img">
                <img src="{{ asset('frontend-assets') }}/img/bg/breadcrumb-bg-02.png" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-details">
                        <div class="blog-head">
                            <div class="blog-category">
                                <ul>
                                    <li><span class="badge badge-light text-dark">Plumbing</span></li>
                                    <li><i class="feather-calendar me-1"></i>{{ $blog->created_at->format('d M Y') }}</li>
                                    <li>
                                        <div class="post-author">
                                            <a href="javascript:void(0);"><img src="{{ asset('frontend-assets') }}/img/user-default.jpg" alt="Post Author"><span>Admin</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h4 class="mb-3">{{ $blog->title }}</h4>
                        </div>

                        <div class="card blog-list shadow-none">
                            <div class="card-body">
                                <div class="blog-image">
                                    <a href=""><img class="img-fluid" src="{{ asset($blog->image) }}" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>

                        <div class="service-wrap blog-review" id="blog_comments_container" style="display:none">
                            <h4>Comments</h4>
                            <ul id="list_blog_comments">
                            </ul>
                        </div>
                        <div class="new-comment">
                            <h4> Write a Comment</h4>
                            <form id="blogCommentForm">
                                <div class="row">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <input type="hidden" name="post_id" id="post_id" value="1">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="post_name" placeholder="Enter Name">
                                            <span class="error-text text-danger" id="post_name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="post_email" placeholder="Enter Email">
                                            <span class="error-text text-danger" id="post_email_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Comment</label>
                                            <textarea rows="6" class="form-control" name="comment" id="comment" placeholder="Enter your comment here"></textarea>
                                            <span class="error-text text-danger" id="comment_error"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <button  type="button" class="btn btn-dark" id="blogCommentBtn" data-name_required="Name is required." data-email_required="Email is required." data-comment_required="Comment is required." data-name_max="Name cannot be exceed 100 characters." data-email_format="Please enter a valid email address.">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
