  <!--**********************************
            Sidebar start
        ***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <div class="dropdown header-profile2 ">
            <a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
                <div class="header-info2 d-flex align-items-center">
                    <img src="{{asset('images/admin/rest.jpg')}}" width="50" alt=""/>
                    <div class="d-flex align-items-center sidebar-info">
                        <div>
                            <span class="font-w400 d-block"></span>
                            <small class="text-end font-w400"></small>
                        </div>	
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="{{url('admin/logout')}}" class="dropdown-item ai-icon">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <span class="ms-2">Logout</span>
                </a>
            </div>
        </div>
        <ul class="metismenu" id="menu">
            <li>
                <a href="" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>	
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Master</span>
                </a>
                <ul aria-expanded="false">
                @if(session()->get('role_as') != 2)
                    <li><a href="{{url('admin/shop')}}">Add Shop</a></li>
                    <li><a href="{{url('admin/category')}}">Add Category</a></li>
                    <li><a href="{{url('admin/item')}}">Add Item</a></li>
                    <li><a href="{{url('admin/resturant')}}">Kitchen</a></li>
                @endif 
                    <li><a href="{{url('admin/orderpage')}}">Order</a></li>
                </ul>
            </li>		
        </ul>
        {{-- <div class="plus-box">
            <p class="fs-14 font-w600 mb-2">Let Jobick Managed<br>Your Resume Easily<br></p>
            <p>Lorem ipsum dolor sit amet</p>
        </div> --}}
        <div class="copyright">
            <p> © {{date("Y")}} All Rights Reserved</p>
            <p class="fs-12">Designed and Developed By <br> <span style="color: red; font-style:bold">ElationSoft.net</span></p>
        </div>
    </div>
</div>
        <!--**********************************
            Sidebar end
        ***********************************-->