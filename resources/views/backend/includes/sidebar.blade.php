<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-cyan elevation-3">
    <a class="brand-link" href="{{ route('frontend.index') }}">
        <img src="{{ asset(get_setting('admin_logo')) }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ app_name() }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <x-utils.link-sidebar :href="route('admin.dashboard')" :text="__('ড্যাশবোর্ড')" icon="nav-icon icon-speedometer"
                        :active="activeClass(Route::is('admin.dashboard'))" class="nav-link" />
                </li>
                {{-- <li class="nav-item">
                    <x-utils.link-sidebar :href="route('frontend.wallet.index')" :text="__('Wallet')" icon="nav-icon icon-speedometer"
                        :active="activeClass(Route::is('frontend.wallet.index'))" class="nav-link" />
                </li> --}}

                <li
                    class="nav-item {{ activeClass(Route::is('admin.auth.user.') || Route::is('admin.auth.role.'), 'menu-open') }}">

                <li class="nav-item">

                    <x-utils.link-sidebar href="#" :text="__('সাইট সেটিংস')" icon="nav-icon icon-star" class="nav-link"
                        rightIcon="fas fa-angle-left right" />
                    <ul class="nav nav-treeview">
                        @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.setting'))
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.general')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('সাধারণ সেটিংস')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.important.links')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('গুরুত্বপূর্ণ লিঙ্ক')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.important.forms')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('গুরুত্বপূর্ণ ফর্ম')" />
                            </li>

                            <li class="nav-item">
                                <x-utils.link-sidebar href="#" :text="__('About')" icon="nav-icon icon-star"
                                    class="nav-link" rightIcon="fas fa-angle-left right" />
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <x-utils.link :href="route('admin.about.settings')" icon="nav-icon icon-arrow-right"
                                            class="nav-link" :text="__('সেটিংস সম্পর্কে')" />
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.slider')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('স্লাইডার সেটিংস')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.cv.template')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('সিভি সেটিংস')" />
                            </li>
                        @endif

                        @if ($logged_in_user->can('admin.sanad'))
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.blog')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('সনদ সেটিংস')" />
                            </li>
                        @endif


                        @if ($logged_in_user->can('admin.computer') || $logged_in_user->can('admin.computer.course.edit'))
                            <li class="nav-item">
                                <x-utils.link-sidebar href="#" :text="__('কম্পিউটার প্রশিক্ষণ')" icon="nav-icon icon-star"
                                    class="nav-link" rightIcon="fas fa-angle-left right" />
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <x-utils.link :href="route('admin.course_type.settings')" icon="nav-icon icon-arrow-right"
                                            class="nav-link" :text="__('টাইপ')" />
                                    </li>
                                    <li class="nav-item">
                                        <x-utils.link :href="route('admin.competition.settings')" icon="nav-icon icon-arrow-right"
                                            class="nav-link" :text="__('কম্পিউটার প্রশিক্ষণ সেটিংস')" />
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                </li>
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.user.info')" icon="nav-icon icon-star" class="nav-link" :text="__('ব্যবহারকারীর তথ্য')" />
                </li>
                <li class="nav-item">
                    <x-utils.link :href="route('admin.union.info')" icon="nav-icon icon-star" class="nav-link" :text="__('ইউনিয়ন তথ্য')" />
                </li>
                @if ($logged_in_user->can('admin.sanad') || $logged_in_user->can('admin.sanad.application.view'))
                    <li class="nav-item">
                        <x-utils.link :href="route('admin.applications')" icon="nav-icon icon-star" class="nav-link"
                            :text="__('সনদ আবেদন')" />
                    </li>
                @endif

                @if ($logged_in_user->can('admin.sanad') || $logged_in_user->can('admin.sanad.history.certificate'))
                    <li class="nav-item">
                        <x-utils.link :href="route('admin.certificate.history')" icon="nav-icon icon-star" class="nav-link"
                            :text="__('মুদ্রিত সনদপত্রের ইতিহাস')" />
                    </li>
                @endif

                @if ($logged_in_user->can('admin.sanad') || $logged_in_user->can('admin.sanad.apply'))
                    <li class="nav-item">
                        <x-utils.link :href="route('admin.apply.applications')" icon="nav-icon icon-star" class="nav-link"
                            :text="__('সনদের জন্য আবেদন করুন')" />
                    </li>
                @endif
                @if ($logged_in_user->can('admin.computer') || $logged_in_user->can('admin.computer.application.view'))
                    <li class="nav-item">
                        <x-utils.link :href="route('admin.training.applications')" icon="nav-icon icon-star" class="nav-link"
                            :text="__('কম্পিউটার কোর্সের আবেদন')" />
                    </li>
                @endif


                @if (
                    $logged_in_user->hasAllAccess() ||
                        ($logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')))
                    <x-utils.link-sidebar href="#" :text="__('অনুমতি')" icon="nav-icon flaticon-lock"
                        class="nav-link" rightIcon="fas fa-angle-left right" />
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-utils.link :href="route('admin.auth.user.index')" icon="nav-icon icon-user" class="nav-link"
                                :text="__('ব্যবহারকারীর ব্যবস্থাপনা')" :active="activeClass(Route::is('admin.auth.user.*'))" />
                        </li>
                @endif

                @if ($logged_in_user->hasAllAccess())
                    <li class="nav-item">
                        <x-utils.link :href="route('admin.auth.role.index')" icon="nav-icon fas fa-user" class="nav-link" :text="__('ভূমিকা ব্যবস্থাপনা')"
                            :active="activeClass(Route::is('admin.auth.role.*'))" />
                    </li>
                @endif
            </ul>
            </li>

            @if ($logged_in_user->hasAllAccess())
                <li class="nav-item ">
                    <x-utils.link-sidebar href="#" :text="__('লগ')" icon="nav-icon fas fa-list" class="nav-link"
                        rightIcon="fas fa-angle-left right" />
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-utils.link :href="route('log-viewer::dashboard')" icon="nav-icon far fa-circle" class="nav-link"
                                :text="__('ড্যাশবোর্ড')" />
                        </li>
                        <li class="nav-item">
                            <x-utils.link :href="route('log-viewer::logs.list')" icon="nav-icon far fa-circle" class="nav-link"
                                :text="__('লগ')" />
                        </li>

                    </ul>
                </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
                <li class="nav-item">
                    <x-utils.link :href="route('admin.setting.certificatePrice')" icon="nav-icon icon-star" class="nav-link" :text="__('সনদ মূল্য')" />
                </li>

                <li class="nav-item">
                    <x-utils.link :href="route('admin.agent.withdrawRequest')" icon="nav-icon icon-star" class="nav-link" :text="__('টাকা তুলার অনুরোধ')" />
                </li>

                <li class="nav-item">
                    <x-utils.link :href="route('admin.agentSetting.index')" icon="nav-icon icon-star" class="nav-link" :text="__('এজেন্ট সিটিং')" />
                </li>

                <li class="nav-item">
                    <x-utils.link :href="route('admin.agent.index')" icon="nav-icon icon-star" class="nav-link" :text="__('এজেন্ট')" />
                </li>

                <li class="nav-item">
                    <x-utils.link :href="route('admin.transaction.index')" icon="nav-icon icon-star" class="nav-link" :text="__('লেনদেন')" />
                </li>
            @endif

            </ul>
        </nav>
    </div>
</aside>
