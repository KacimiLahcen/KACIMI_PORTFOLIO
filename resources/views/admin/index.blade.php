@extends('admin.layouts.admin')

@section('content')
<div class="admin-dashboard">
  <div class="admin-hero-panel">
    <div>
      <span class="admin-eyebrow">Portfolio control room</span>
      <h1>Welcome back, {{ $auth_user }}</h1>
      <p>Manage the content, projects, services, skills, testimonials, and profile details that power your public portfolio.</p>
    </div>
    <div class="admin-hero-actions">
      <a href="{{ route('admin.portfolio.create') }}" class="btn btn-gradient-primary">Add Project</a>
      <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-dark">View Site</a>
    </div>
  </div>

  <div class="row admin-stats-grid">
    <div class="col-xl-2 col-md-4 col-sm-6 grid-margin stretch-card">
      <a class="admin-stat-card" href="{{ route('admin.portfolio.index') }}">
        <span>Projects</span>
        <strong>{{ $stats['projects'] }}</strong>
        <i class="mdi mdi-folder-image"></i>
      </a>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 grid-margin stretch-card">
      <a class="admin-stat-card" href="{{ route('admin.category.index') }}">
        <span>Categories</span>
        <strong>{{ $stats['categories'] }}</strong>
        <i class="mdi mdi-tag-multiple"></i>
      </a>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 grid-margin stretch-card">
      <a class="admin-stat-card" href="{{ route('admin.service.index') }}">
        <span>Services</span>
        <strong>{{ $stats['services'] }}</strong>
        <i class="mdi mdi-format-list-bulleted"></i>
      </a>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 grid-margin stretch-card">
      <a class="admin-stat-card" href="{{ route('admin.skill.index') }}">
        <span>Skills</span>
        <strong>{{ $stats['skills'] }}</strong>
        <i class="mdi mdi-puzzle"></i>
      </a>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 grid-margin stretch-card">
      <a class="admin-stat-card" href="{{ route('admin.review.index') }}">
        <span>Reviews</span>
        <strong>{{ $stats['reviews'] }}</strong>
        <i class="mdi mdi-comment-quote"></i>
      </a>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 grid-margin stretch-card">
      <a class="admin-stat-card" href="{{ route('admin.qualification.index') }}">
        <span>Timeline</span>
        <strong>{{ $stats['qualifications'] }}</strong>
        <i class="mdi mdi-school"></i>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="card admin-focus-card">
        <div class="card-body">
          <span class="admin-eyebrow">Fast actions</span>
          <h4 class="card-title">Keep your portfolio fresh</h4>
          <div class="admin-action-grid">
            <a href="{{ route('admin.aboutme.index') }}"><i class="mdi mdi-account-edit"></i><span>Edit About Me</span></a>
            <a href="{{ route('admin.service.create') }}"><i class="mdi mdi-plus-box"></i><span>Add Service</span></a>
            <a href="{{ route('admin.skill.create') }}"><i class="mdi mdi-star-plus"></i><span>Add Skill</span></a>
            <a href="{{ route('admin.setting.index') }}"><i class="mdi mdi-settings"></i><span>Update Settings</span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
      <div class="card admin-note-card">
        <div class="card-body">
          <span class="admin-eyebrow">Brand style</span>
          <h4 class="card-title">Black, sharp, neon.</h4>
          <p>Admin controls now match the front-facing portfolio, so editing content feels like part of the same system.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
