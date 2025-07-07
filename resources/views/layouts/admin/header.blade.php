<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>
		  </ul>
	  </div>

	@php
		$id = Auth::user()->id;
		$adminData = App\Models\Admin::findOrFail($id);
    @endphp
        <div class="navbar-custom-menu r-side">
            {{-- <a class="dropdown-item" href={{ route('admin.profile') }}> --}}
			<img class="rounded-circle header-profile-user rounded avatar-lg"  src="{{ (!empty($adminData->image))? url('upload/admin_images/'.$adminData->image):url('adminPanel/images/avatar/no_av.jpg') }}"
                alt="Header Avatar">	
			<i class="ri-user-line align-middle me-1"></i> {{$adminData->name}}</a>
        </div>
    </nav>
  </header>
