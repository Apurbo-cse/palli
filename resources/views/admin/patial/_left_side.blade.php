<div class="sidebar-inner slimscrollleft">
    <div class="user-details">
        <div class="text-center">
            @if(Auth::user()->image)
                <img src="{{asset(Auth::user()->image)}}" alt="user-img" class="img-circle">
            @else
                <img src="{{asset('/')}}assets/admin/images/avatar.png" alt="user-img" class="img-circle">
            @endif
        </div>
        <div class="user-info">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</a>
                <ul class="dropdown-menu">
<!--                    <li><a href="javascript:void(0)"> Profile</a></li>
                    <li><a href="javascript:void(0)"> Settings</a></li>-->
                    <li><a href="javascript:void(0)"> Lock screen</a></li>
                    <li><a href="{{route('admin.profile')}}"> Profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
        </div>
    </div>
    <!--- Divider -->
    <div style="height: 1px;background: #00000054;"></div>
    <div id="sidebar-menu">
        <ul>
            <li>
                <a href="{{route('admin.dashboard')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin.dashboard') ? 'active': ''}}"><i class="ti-home"></i><span> Dashboard </span></a>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" {{\Illuminate\Support\Facades\Request::is('admin/categories/*') ? 'active subdrop': ''}}{{\Illuminate\Support\Facades\Request::is('admin/subcategories/*') ? 'active subdrop': ''}}><i class="ti-agenda"></i> <span> Category </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{route('admin.categories.index')}}">Category</a></li>
                    <li><a href="{{route('admin.subcategories.index')}}">Sub Category</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.products.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/products/*') ? 'active': ''}}"><i class="ti-ruler-pencil"></i><span> Products </span></a>
            </li>

            <li>
                <a href="{{route('admin.tags.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/tags/*') ? 'active': ''}}"><i class="mdi mdi-tag"></i><span> Tags </span></a>
            </li>

            <li>
                <a href="{{route('admin.sliders.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/sliders/*') ? 'active': ''}}"><i class="mdi mdi-satellite"></i><span> Slider </span></a>
            </li>

            <li>
                <a href="{{route('admin.settings.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/settings/*') ? 'active': ''}}"><i class="mdi mdi-settings"></i><span> Settings </span></a>
            </li>

            <li>
                <a href="{{route('admin.contact.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/contact/*') ? 'active': ''}}"><i class="mdi mdi-account-card-details"></i><span> Contact Us </span></a>
            </li>

            <li>
                <a href="{{route('admin.newsletter.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/newsletter/*') ? 'active': ''}}"><i class="mdi mdi-bell-ring"></i><span> Subscription list </span></a>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/membership/*') ? 'active subdrop': ''}}{{\Illuminate\Support\Facades\Request::is('admin/about/*') ? 'active subdrop': ''}}"><i class="mdi mdi-information"></i> <span> About </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li> <a href="{{route('admin.about.index')}}" class="waves-effect"><span> About </span></a> </li>
                    <li><a href="{{route('admin.membership.index')}}" class="waves-effect"><span> Membership </span></a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" {{\Illuminate\Support\Facades\Request::is('admin/artisan/*') ? 'active subdrop': ''}}{{\Illuminate\Support\Facades\Request::is('admin/artisanInfo/*') ? 'active subdrop': ''}}><i class="ti-agenda"></i> <span> Artisan </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li> <a href="{{route('admin.artisan.index')}}" class="waves-effect"><span> Artisan </span></a> </li>
                    <li> <a href="{{route('admin.artisanInfo.index')}}" class="waves-effect"><span> Artisan Info </span></a> </li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.video.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/video/*') ? 'active': ''}}"><i class="mdi mdi-video"></i><span> Video </span></a>
            </li>

            <li>
                <a href="{{route('admin.fairTrade.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/fairTrade/*') ? 'active': ''}}"><i class="mdi mdi-settings"></i><span> Fair Trade </span></a>
            </li>

            <li>
                <a href="{{route('admin.blog.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('admin/blog/*') ? 'active': ''}}"><i class="mdi mdi-blogger"></i><span> Blog </span></a>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" {{\Illuminate\Support\Facades\Request::is('admin/material/*') ? 'active subdrop': ''}}{{\Illuminate\Support\Facades\Request::is('admin/materialInfo/*') ? 'active subdrop': ''}}><i class="mdi mdi-assistant"></i> <span> Material </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li> <a href="{{route('admin.material.index')}}" class="waves-effect"><span> Material </span></a> </li>
                    <li> <a href="{{route('admin.materialInfo.index')}}" class="waves-effect"><span> Material Info</span></a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
