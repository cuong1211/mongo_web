@extends('layout.index')
@section('toolbar')
<div class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column me-5">
        <!--begin::Title-->
        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Create User</h1>
        <!--end::Title-->
       
    </div>
    <!--end::Page title-->
   
</div>
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
    <!--begin::Container-->
        <div class="card mb-9 mb-xl-9">
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				{{-- <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20"> --}}
					<!--begin::Logo-->
					
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        @if(count($errors)>0)
                      <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                          {{$err}}<br>
                        @endforeach
                      </div>
                    @endif
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="{{route('users.store')}}" method="POST">
                            @csrf
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								
							<!--begin::Separator-->
							
							<!--end::Separator-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								
								<!--end::Col-->
								<!--begin::Col-->
								<div class="fv-row mb-7">
									<label class="form-label fw-bolder text-dark fs-6">Full Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Email</label>
								<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
							</div>
                            <div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6">Postion</label>
                                <div class="form-control form-control-lg form-control-solid">
                                    <select class="form-control form-control-lg form-control-solid" name="isAdmin" >
                                        <option value="1">Admin</option>
                                        <option value="0">Employee</option>
                                        
                                        
                                    </select>
                                </div>
                              </div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
									<!--begin::Meter-->
									<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
									</div>
									<!--end::Meter-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
							</div>
                           
							<!--end::Input group-->
							<!--begin::Input group-->
							
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Continue</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				{{-- </div> --}}
				<!--end::Content-->
				
			</div>
        </div>
    </div>
    <!--end::Container-->
</div>
@endsection