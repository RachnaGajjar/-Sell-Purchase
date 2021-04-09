@extends('layouts.app')

@section('content')
<script>
        var loadFile = function(event) {
        var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);

                document.getElementById("output").style.display = "block";
  };
</script>
<div class="c container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          {{ $user->name }}'s Profile
        </div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          @if (session('failed'))
          <div class="alert alert-danger" role="alert">
            {{ session('failed') }}
          </div>
          @endif
          <form enctype="multipart/form-data" action="{{ route('user.profile') }}" method="POST">

            @csrf
            <div class="form-group row">
              <div class="col-md-3">
                
                <img class="card-img-top" src="../uploads/users/{{ old('avatar', @$user->profile->avatar) }}" style="width: 150px; height: 150px; border-radius: 50%; display: none;">
              </div>
              <div class="col-sm-9" style="margin-top: 10px;">
                <label>Update Profile Image</label><br>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
            </div>


            <div class="form-group row">
              <label for="staticEmail" class="col-sm-3 col-form-label">Email:</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->email }}">
              </div>
            </div>    
            <div class="form-group row">
              <label for="inputGender" class="col-sm-3 col-form-label">Gender:</label>
              <div class="col-md-4 col-sm-8">
                <select class="form-control" id="inputGender" placeholder="Password" name="gender">
                  <option {{ old('gender', @$user->profile->gender) == 'MALE'? 'selected': '' }} value="MALE"> Male </option>
                  <option {{ old('gender', @$user->profile->gender) == 'FEMALE'? 'selected': '' }} value="FEMALE"> Female </option>
                  <option {{ old('gender', @$user->profile->gender) == 'OTHER'? 'selected': '' }} value="OTHER"> Other </option>
                </select>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="inputMobile">Mobile:</label>
              <div class="col-md-9">
                <input
                name="mobile"
                id="inputMobile"
                value="{{ old('mobile', @$user->profile->mobile) }}"
                class="form-control {{ @$errors->has('mobile')? 'is-invalid': '' }}"></input>
                @if(@$errors->has('mobile'))
                <div class="invalid-feedback">
                  {{ $errors->first('mobile') }}
                </div>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="inputSemester">Semester:</label>
              <div class="col-md-9">
                <input name="semester" id="inputSemester" class="form-control"
                value="{{ old('semester', @$user->profile->semester) }}"
                ></input>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="inputStream">Stream:</label>
              <div class="col-md-9">
                <input name="stream" id="inputStream" class="form-control"
                value="{{ old('stream', @$user->profile->stream) }}"
                ></input>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3">&nbsp;</div>
              <div class="col-md-9">
                <button class="btn btn-success">Save</button>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection
