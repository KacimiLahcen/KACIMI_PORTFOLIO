@extends('admin.layouts.admin')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Service</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif
        <form class="forms-sample" method="POST" action="{{ route('admin.service.update', $service->id )}}">
          @csrf
          @method('PUT')
            <div class="form-group">
          <div class="row">
            <div class="col-md-5">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Icon</label>
                <div class="col-sm-9">
                  @php
                    $icons = [
                      'fas fa-code' => 'Code',
                      'fas fa-paint-brush' => 'Design',
                      'fas fa-mobile-alt' => 'Mobile App',
                      'fas fa-database' => 'Database',
                      'fas fa-server' => 'Backend / API',
                      'fas fa-cloud' => 'Cloud / DevOps',
                      'fas fa-shield-alt' => 'Security',
                      'fas fa-tachometer-alt' => 'Performance',
                      'fas fa-search' => 'SEO',
                      'fas fa-shopping-cart' => 'E-Commerce',
                      'fas fa-chart-bar' => 'Analytics',
                      'fas fa-cogs' => 'Automation',
                      'fas fa-laptop-code' => 'Web Dev',
                      'fas fa-robot' => 'AI / ML',
                      'fas fa-plug' => 'Integrations',
                    ];
                  @endphp
                  <select name="icon" id="icon-select" class="form-control" required>
                    @foreach($icons as $class => $label)
                      <option value="{{ $class }}" {{ $service->icon == $class ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                  </select>
                  <small class="text-muted mt-1 d-block"><i id="icon-preview" class="{{ $service->icon }}"></i> Preview</small>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Service Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" placeholder="enter service name" value="{{ $service->name }}" required/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Description</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4" maxlength="255" name="description" required>{{ $service->description }}</textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
        </form>
      </div>
    </div>
  </div>

<script>
  document.getElementById('icon-select').addEventListener('change', function() {
    document.getElementById('icon-preview').className = this.value;
  });
</script>

@endsection
