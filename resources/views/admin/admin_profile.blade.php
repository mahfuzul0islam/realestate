@extends('admin.dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center  mb-2">


                            <img class="wd-100 rounded-circle"
                                src="{{ !empty($profileData->photo) ? url('/upload/admin_images/' . $profileData->photo) : url('upload/admin_images/no_image.jpg') }}"
                                alt="profile">
                            <span class="h4 ms-3 text-light">{{ $profileData->username }}</span>



                        </div>

                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">

                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Update profile</h6>

                                <form method="POST" action="{{route('admin.update')}}" enctype="multipart/form-data" class="forms-sample">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username"
                                            id="exampleInputUsername1" autocomplete="off" placeholder="Username"
                                            value="{{ $profileData->username }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">name</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputUsername1"
                                            autocomplete="off" placeholder="Username" value="{{ $profileData->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $profileData->email }}" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">phone</label>
                                        <input type="text" class="form-control" name="phone" id="exampleInputUsername1"
                                            autocomplete="off" placeholder="phone" value="{{ $profileData->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">address</label>
                                        <input type="text" class="form-control" name="address" id="exampleInputUsername1"
                                            autocomplete="off" placeholder="address" value="{{ $profileData->address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">photo</label>
                                        <input class="form-control" name="photo" type="file" id="image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"></label>
                                        <img class="wd-80 rounded-circle" id="showImage"
                                            src="{{ !empty($profileData->photo) ? url('/upload/admin_images/' . $profileData->photo) : url('upload/admin_images/no_image.jpg') }}"
                                            alt="profile">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            autocomplete="off" placeholder="Password">
                                    </div> --}}
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            Remember me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
