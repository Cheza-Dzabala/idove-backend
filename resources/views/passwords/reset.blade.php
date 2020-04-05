@extends('layouts.app')


@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Reset Password
                </div>
                <div class="card-body">
                 <form method="POST" action="{{ route('password.store', Auth::user()->username) }}">
                     @csrf
                     <div class="form-group">
                         <label for="current_password" >Current Password</label>
                         <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" value="{{  old('current_password') }}" />
                         @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                     <div class="form-group">
                         <label for="password"  >New Password</label>
                         <input type="password" name="password" value="{{  old('password') }}"  class="form-control  @error('password') is-invalid @enderror" />
                         @error('password')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                      </div>

                     <div class="form-group">
                         <label for="confirm_password">Confirm Password</label>
                         <input type="password" name="password_confirmation" value="{{  old('password_confirmation') }}"  class="form-control @error('password_confirmation') is-invalid @enderror"  />
                         @error('password_confirmation')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
                </div>
            </div>
           </div>
       </div>
    </div>
@endsection
