<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{ route('dashboard') }}" class="logo_text_custom">
                <span>{{ config('app.name', 'Laravel') }}</span>
                <!-- <img alt="Logo" src="http://www.w3.org/2000/svg" width="150" /> -->
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                id="Path-94" fill="#000000" fill-rule="nonzero"
                                transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                            <path
                                d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                        </g>
                    </svg></span>
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                id="Path-94" fill="#000000" fill-rule="nonzero" />
                            <path
                                d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                        </g>
                    </svg></span>
            </button>

            <!--
   <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
   -->
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
            data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  {{ Request::is('admin/dashboard*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('dashboard') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon flaticon-home"></i><span
                            class="kt-menu__link-text">Dashboard</span></a></li>
                <li class="kt-menu__item  {{ Request::is('admin/users/*/USER') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('user.list', ['role' => 'USER']) }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-users"></i><span class="kt-menu__link-text">Users</span></a>
                </li>
                <li class="kt-menu__item  {{ Request::is('admin/users/*/CLIENT') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('user.list', ['role' => 'CLIENT']) }}"
                        class="kt-menu__link "><i class="kt-menu__link-icon fa fa-users"></i><span
                            class="kt-menu__link-text">Leads</span></a>
                </li>
                <li class="kt-menu__item {{ Request::is('admin/posts*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('posts.index') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-list-alt  "></i><span
                            class="kt-menu__link-text">Posts</span></a></li>
                <li class="kt-menu__item {{ Request::is('admin/support-ticket*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('support.ticket.list') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-list-alt  "></i><span class="kt-menu__link-text">Support
                            Tickets</span></a></li>
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Master</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  {{ Request::is('admin/strain-base*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('strain.base.list') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-adjust"></i><span class="kt-menu__link-text">Strain
                            Base</span></a></li>
                <li class="kt-menu__item  {{ Request::is('admin/desire-effects*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('desired.effects.list') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-list"></i><span class="kt-menu__link-text">Desire
                            Effects</span></a></li>
                <li class="kt-menu__item {{ Request::is('admin/strain-options*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('strain.options.list') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-arrows-alt"></i><span class="kt-menu__link-text">Strain
                            Options</span></a></li>
                <li class="kt-menu__item {{ Request::is('admin/plants*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('plant.list') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-tree  "></i><span
                            class="kt-menu__link-text">Plants</span></a></li>
                <li class="kt-menu__item {{ Request::is('admin/meta-data*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('meta.data.list') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-asterisk  "></i><span class="kt-menu__link-text">Meta
                            Data</span></a></li>
                <li class="kt-menu__item {{ Request::is('admin/affiliate-commissions*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('admin.affiliateCommission') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon la la-bitcoin"></i><span class="kt-menu__link-text">Affiliate Commissions</span></a></li>
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Learning Management</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item {{ Request::is('admin/plants*') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('order.list') }}" class="kt-menu__link "><i
                            class="kt-menu__link-icon fa fa-tree  "></i><span
                            class="kt-menu__link-text">Order List</span></a></li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ Request::is('admin/education-course/*') ? 'kt-menu__item--open' : '' }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                        class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                            <i class="kt-menu__link-icon fa fa-book"></i>
                            </svg></span><span class="kt-menu__link-text">Education</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item {{ Request::is('admin/cms/userdashboard*') ? 'kt-menu__item--active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('education.course.list') }}"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Lessons</span></a></li>

                            <li class="kt-menu__item {{ Request::is('admin/cms/affiliated-center*') ? 'kt-menu__item--active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('education.video.list') }}"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">videos</span></a></li>

                        </ul>
                    </div>
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Content Management</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu {{ Request::is('admin/cms/*') ? 'kt-menu__item--open' : '' }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                        class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                            <i class="kt-menu__link-icon fa fa-file-alt"></i>
                            </svg></span><span class="kt-menu__link-text">CMS Pages</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item {{ Request::is('admin/cms/userdashboard*') ? 'kt-menu__item--active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('cms.userdashboard') }}"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">User Dashboard</span></a></li>

                            <li class="kt-menu__item {{ Request::is('admin/cms/affiliated-center*') ? 'kt-menu__item--active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('cms.affiliated.center') }}"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Affiliate Center</span></a></li>
                            <li class="kt-menu__item {{ Request::is('admin/announcements*') ? 'kt-menu__item--active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('admin.announcements') }}"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Announcements</span></a></li>

                        </ul>
                    </div>
            </ul>
        </div>
    </div>
    <!-- end:: Aside Menu -->
</div>

<!-- end:: Aside -->
