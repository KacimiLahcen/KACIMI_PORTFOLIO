@extends('admin.layouts.admin')

@section('content')
{{-- 
<div class="main-panel">
    <div class="content-wrapper"> --}}
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New Skill</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif
        {{-- <p class="card-description"> Basic form elements </p> --}}
        <form class="forms-sample" method="POST" action="{{ route('admin.skill.store') }}" enctype="multipart/form-data">
          @csrf
          <p class="card-description"> Skill identity </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Skill</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="enter skill name" value="{{old('name')}}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Logo</label>
                <div class="col-sm-9">
                  <input type="file" name="logo" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml"/>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
{{-- </div>
</div> --}}

@endsection
