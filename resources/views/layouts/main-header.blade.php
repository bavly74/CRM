<!-- main-header opened -->
			<div class="sticky main-header side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="dark-logo-1" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-2" alt="logo"></a>
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="dark-logo-2" alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<div class="mr-3 main-header-center d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div>
					</div>
					<div class="main-header-right">
						<ul class="nav">
							<li class="">
								<div class="dropdown nav-itemd-none d-md-flex">
									<a href="#" class="pl-0 d-flex nav-item nav-link country-flag1" data-toggle="dropdown" aria-expanded="false">
										<span class="mr-0"> @lang('tr.Languages')</b></span>
										<div class="my-auto">
											<strong class="my-auto ml-2 mr-2">English</strong>
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">


                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item d-flex ">

                                                    <div class="d-flex">
                                                        <span class="mt-2">{{ $properties['native'] }}</span>
                                                    </div>
                                                </a>
                                        @endforeach

									</div>
								</div>
							</li>
						</ul>
						<div class="ml-auto nav nav-item navbar-nav-right">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
							<div class="dropdown nav-item main-header-message ">
								<a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span class=" pulse-danger"></span></a>
								<div class="dropdown-menu">
									<div class="text-right menu-header-content bg-primary">
										<div class="d-flex">
											<h6 class="mb-1 text-white dropdown-title tx-15 font-weight-semibold">Messages</h6>
											<span class="float-left my-auto mr-auto badge badge-pill badge-warning">Mark All Read</span>
										</div>
										<p class="pb-0 mb-0 text-white dropdown-title-text subtext op-6 tx-12 ">You have 4 unread messages</p>
									</div>
									<div class="main-message-list chat-scroll">
										<a href="#" class="p-3 d-flex border-bottom">
											<div class=" drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/3.jpg')}}">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name">Petey Cruiser</h5>
												</div>
												<p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
												<p class="float-right mt-2 mb-0 mr-2 text-left time">Mar 15 3:55 PM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/2.jpg')}}">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name">Jimmy Changa</h5>
												</div>
												<p class="mb-0 desc">All set ! Now, time to get to you now......</p>
												<p class="float-right mt-2 mb-0 mr-2 text-left time">Mar 06 01:12 AM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/9.jpg')}}">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name">Graham Cracker</h5>
												</div>
												<p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
												<p class="float-right mt-2 mb-0 mr-2 text-left time">Feb 25 10:35 AM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/12.jpg')}}">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name">Donatella Nobatti</h5>
												</div>
												<p class="mb-0 desc">Here are some products ...</p>
												<p class="float-right mt-2 mb-0 mr-2 text-left time">Feb 12 05:12 PM</p>
											</div>
										</a>
										<a href="#" class="p-3 d-flex border-bottom">
											<div class="drop-img cover-image" data-image-src="{{URL::asset('assets/img/faces/5.jpg')}}">
												<span class="avatar-status bg-teal"></span>
											</div>
											<div class="wd-90p">
												<div class="d-flex">
													<h5 class="mb-1 name">Anne Fibbiyon</h5>
												</div>
												<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
												<p class="float-right mt-2 mb-0 mr-2 text-left time">Jan 29 03:16 PM</p>
											</div>
										</a>
									</div>
									<div class="text-center dropdown-footer">
										<a href="text-center">VIEW ALL</a>
									</div>
								</div>
							</div>
							<div class="dropdown nav-item main-header-notification">
								<a class="new nav-link" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class=" pulse"></span></a>
								<div class="dropdown-menu">
									<div class="text-right menu-header-content bg-primary">
										<div class="d-flex">
											<h6 class="mb-1 text-white dropdown-title tx-15 font-weight-semibold">Notifications</h6>
											<span class="float-left my-auto mr-auto badge badge-pill badge-warning">Mark All Read</span>
										</div>
										<p class="pb-0 mb-0 text-white dropdown-title-text subtext op-6 tx-12 ">You have 4 unread Notifications</p>
									</div>
									<div class="main-notification-list Notification-scroll">
										<a class="p-3 d-flex border-bottom" href="#">
											<div class="notifyimg bg-pink">
												<i class="text-white la la-file-alt"></i>
											</div>
											<div class="mr-3">
												<h5 class="mb-1 notification-label">New files available</h5>
												<div class="notification-subtext">10 hour ago</div>
											</div>
											<div class="mr-auto" >
												<i class="text-left las la-angle-left text-muted"></i>
											</div>
										</a>
										<a class="p-3 d-flex" href="#">
											<div class="notifyimg bg-purple">
												<i class="text-white la la-gem"></i>
											</div>
											<div class="mr-3">
												<h5 class="mb-1 notification-label">Updates Available</h5>
												<div class="notification-subtext">2 days ago</div>
											</div>
											<div class="mr-auto" >
												<i class="text-left las la-angle-left text-muted"></i>
											</div>
										</a>
										<a class="p-3 d-flex border-bottom" href="#">
											<div class="notifyimg bg-success">
												<i class="text-white la la-shopping-basket"></i>
											</div>
											<div class="mr-3">
												<h5 class="mb-1 notification-label">New Order Received</h5>
												<div class="notification-subtext">1 hour ago</div>
											</div>
											<div class="mr-auto" >
												<i class="text-left las la-angle-left text-muted"></i>
											</div>
										</a>
										<a class="p-3 d-flex border-bottom" href="#">
											<div class="notifyimg bg-warning">
												<i class="text-white la la-envelope-open"></i>
											</div>
											<div class="mr-3">
												<h5 class="mb-1 notification-label">New review received</h5>
												<div class="notification-subtext">1 day ago</div>
											</div>
											<div class="mr-auto" >
												<i class="text-left las la-angle-left text-muted"></i>
											</div>
										</a>
										<a class="p-3 d-flex border-bottom" href="#">
											<div class="notifyimg bg-danger">
												<i class="text-white la la-user-check"></i>
											</div>
											<div class="mr-3">
												<h5 class="mb-1 notification-label">22 verified registrations</h5>
												<div class="notification-subtext">2 hour ago</div>
											</div>
											<div class="mr-auto" >
												<i class="text-left las la-angle-left text-muted"></i>
											</div>
										</a>
										<a class="p-3 d-flex border-bottom" href="#">
											<div class="notifyimg bg-primary">
												<i class="text-white la la-check-circle"></i>
											</div>
											<div class="mr-3">
												<h5 class="mb-1 notification-label">Project has been approved</h5>
												<div class="notification-subtext">4 hour ago</div>
											</div>
											<div class="mr-auto" >
												<i class="text-left las la-angle-left text-muted"></i>
											</div>
										</a>
									</div>
									<div class="dropdown-footer">
										<a href="">VIEW ALL</a>
									</div>
								</div>
							</div>
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"></a>
								<div class="dropdown-menu">
									<div class="p-3 main-header-profile bg-primary">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}" class=""></div>
											<div class="my-auto mr-3">
												<h6>Petey Cruiser</h6><span>Premium Member</span>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
									<a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
									<a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
									<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
									<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>
									<a class="dropdown-item" href="{{ url('/' . $page='page-signin') }}"><i class="bx bx-log-out"></i> Sign Out</a>
								</div>
							</div>
							<div class="dropdown main-header-message right-toggle">
								<a class="pr-0 nav-link" data-toggle="sidebar-left" data-target=".sidebar-left">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
