@extends('layouts.front')

@section('content')
<section class="user-profile--wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <table class="profile-tab--menu">
                    <tr>
                        <td><a href="{{ route('users.profile') }}">My Profile</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('orders.list') }}">My Orders</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="profile-current--wrap">
                    <table class="profile-current--details">
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><span>{{ $user->name }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td><span>{{ $user->email }}</span></td>
                        </tr>
                    </table>
                    <div class="profile-password--wrap">
                       <form id="change-password-form" action="{{ route('users.changePassword',$user->id) }}" method="POST">
                           @csrf
                           <div class="col-md-12">
                               <div class="form-group">
                                   <label for="name">Reset Password </label>
                                   <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                   @error('password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="name">Confirm Password </label>
                                   <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                               </div>
                           </div>
                           <div class="col-md-12">
                               <button type="submit" class="btn btn-primary">
                                   {{ __('Save') }}
                               </button>
                           </div>
                       </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section ('footer-script')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script>
    $( "#change-password-form" ).validate({
        rules: {
            password: {
                required: !0
            },
            password_confirm: {
                required: !0,
                equalTo: "#password"
            }
        }
    });
</script>
@endsection
