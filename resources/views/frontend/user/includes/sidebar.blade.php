<!-- Main Sidebar Container -->
<link href="{{ mix('css/backend.css') }}" rel="stylesheet">
<livewire:styles />
<aside class="main-sidebar sidebar-light-cyan elevation-3" style="height: 175%;">
    <div class="w-100 text-center py-3 border-bottom">
        <a href="{{ route('frontend.user.account') }}">
            <div class="rounded-circle d-inline-block adm-profile-container"><img src="/img/business.png" alt="image"
                    class="rounded-circle elevation-2" style="width:70px;height:70px;"></div>
        </a>
        <p class="text-center text-color-2 mt-2 mb-0 font-17 font-md-15 font-medium">
            {{ $logged_in_user->name ?? 'User' }}
        </p>
    </div>

    <div class="sidebar">
        <nav class="mt-2">

            @if ($logged_in_user->register_for !== 'এজেন্ট')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <x-utils.link-sidebar :href="route('frontend.user.dashboard')" :text="__('ড্যাশবোর্ড')" icon="nav-icon icon-star"
                            :active="activeClass(Route::is('frontend.user.dashboard'))" class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link-sidebar :href="route('frontend.user.union.info')" :text="__('ইউনিয়ন তথ্য')" icon="nav-icon icon-star"
                            :active="activeClass(Route::is('frontend.user.union.info'))" class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link :href="route('frontend.user.info')" icon="nav-icon icon-star" class="nav-link" :text="__('ব্যবহারকারীর তথ্য')" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link-sidebar :href="route('frontend.user.all.sanad')" :text="__('সনদ')" icon="nav-icon icon-speedometer"
                            :active="activeClass(Route::is('frontend.user.all.sanad'))" class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link-sidebar :href="route('frontend.user.sanad.application')" :text="__('সনদ অ্যাপ্লিকেশন')" icon="nav-icon icon-speedometer"
                            :active="activeClass(Route::is('frontend.user.sanad.application'))" class="nav-link" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link-sidebar :href="route('frontend.user.course.application')" :text="__('কম্পিউটার কোর্সের আবেদন')" icon="nav-icon icon-speedometer"
                            :active="activeClass(Route::is('frontend.user.course.application'))" class="nav-link" />
                    </li>

                    <li class="nav-item">
                        <x-utils.link-sidebar href="#" :text="__('সিভি')" icon="nav-icon icon-star"
                            class="nav-link" rightIcon="fa fa-angle-left right" />
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <x-utils.link :href="route('frontend.user.cv.information')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('সিভি তথ্য')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('frontend.user.cv.profile')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('সিভি প্রোফাইল')" />
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul>
                    <li class="nav-item">
                        <x-utils.link :href="route('frontend.user.agent.linkGenerate')" icon="nav-icon far fa-circle" class="nav-link"
                            :text="__('লিংক তৈরি')" />
                    </li>
                    <li class="nav-item">
                        <x-utils.link :href="route('frontend.user.agent.agnetClient')" icon="nav-icon far fa-circle" class="nav-link"
                            :text="__('ক্লায়েন্ট')" />
                    </li>
                </ul>
            @endif

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
