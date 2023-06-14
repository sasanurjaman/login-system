@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Profile</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Profile</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- form start -->
        <form method="POST" action="{{ route('profile.update', $profile->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group mr-2">
                            <label for="first_name">First Name</label>
                            <input name="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                value="{{ old('first_name',$profile->first_name) }}">
                            @error('first_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mr-2">
                            <label for="last_name">Last Name</label>
                            <input name="last_name" type="text"
                                class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                value="{{ old('last_name',$profile->last_name) }}">
                            @error('last_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mr-2">
                            <label>Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="male" @if ( old('gender',$profile->gender == 'male')) {{ "selected "}}
                                    @endif>Male
                                </option>
                                <option value="female" @if ( old('gender',$profile->gender == 'female')) {{ "selected
                                    "}} @endif>Female
                                </option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mr-2">
                            <label for="brithday">Brithday</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input name="brithday" type="text" id="datepicker" placeholder="Select a date"
                                    class="form-control datetimepicker-input @error('brithday') is-invalid @enderror"
                                    value="{{ old('brithday', $profile->brithday) }}">
                                <div class="input-group-append">
                                    <label for="datepicker" class="input-group-text"><i
                                            class="far fa-calendar-alt"></i></label>
                                </div>
                                <input type="hidden" id="selected_date" name="selected_date">
                            </div>
                            @error('brithday')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mr-2">
                            <label for="born">Born</label>
                            <input name="born" type="text" class="form-control @error('born') is-invalid @enderror"
                                id="born" value="{{ old('born',$profile->born) }}">
                            @error('born')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mr-2">
                            <label for="phone">Phone Number</label>
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" value="{{ old('phone',$profile->phone) }}">
                            @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mr-2">
                            <label>Address</label>
                            <textarea name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror"
                                rows="3">{{ old('address',$profile->address) }}</textarea>
                            @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ml-2">
                            <label for="job">Job</label>
                            <input name="job" type="text" class="form-control @error('job') is-invalid @enderror"
                                id="job" value="{{ old('job',$profile->job) }}">
                            @error('job')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ml-2">
                            <label for="education">Education</label>
                            <input name="education" type="text"
                                class="form-control @error('education') is-invalid @enderror" id="education"
                                value="{{ old('education',$profile->education) }}">
                            @error('education')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ml-2">
                            <label for="hoby">Hoby</label>
                            <input name="hoby" type="text" class="form-control @error('hoby') is-invalid @enderror"
                                id="hoby" value="{{ old('hoby',$profile->hoby) }}" placeholder="use coma">
                            @error('hoby')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ml-2">
                            <label for="note">Note</label>
                            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror"
                                rows="3">{{ old('note',$profile->note) }}</textarea>
                            @error('note')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ml-2">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input onchange="preview()" name="image" id="image" type="file"
                                    class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        @if ($profile->image)
                        <img src="{{ asset('storage/' . $profile->image )}} " class="img-fluid col-sm-5">
                        @else
                        <img class="img-fluid col-sm-5">
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection

@push('css')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="\plugins\jquery-ui\jquery-ui.min.css">
@endpush

@push('script')
<script src="\plugins\jquery-ui\jquery-ui.min.js"></script>

<script>
    // datefiker
    $(function() {
        $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd", // Change the date format as per your requirement
        onSelect: function(date) {
            $("#selected_date").val(date);
            }
        });
    });

    // preview image 
    $('.custom-file-input').change(function () {
        const file = this.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function(e) {
            $('.img-fluid').attr('src', e.target.result)
        }
    })
</script>
@endpush