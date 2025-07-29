<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <div class="d-flex align-items-center justify-content-center">
{{--                        <img src="{{ asset('admin/images/crm.png') }}" alt="" height="60px">--}}
                        <h3><b>{{env('APP_NAME')}}</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ url('admin/dashboard')}}">
                    <i data-feather="home"></i>
                    <span>Strona główna</span>
                </a>
            </li>

            <li class="header nav-small-cap">System</li>
            {{--Klienci--}}
            <li class="treeview">
                <a href="{{ route('admin.customers.index') }}">
                    <i data-feather="customers"></i>
                    <span>{{ __('system.nav_customers') }}</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.customers.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_customers') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{--Nowości--}}
             <li class="treeview">
                <a href="{{ route('admin.categories.index') }}">
                    <i data-feather="news"></i>
                    <span>{{ __('system.nav_news') }}</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-cogs" ></i>
                            <span>{{ __('system.nav_news_categories') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.news.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_news') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{--oferty--}}
            <li class="treeview">
                <a href="{{ route('admin.offers.index') }}">
                    <i data-feather="offers"></i>
                    <span>{{ __('system.nav_offers') }}</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.offers.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_offers') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{--zadania--}}
             <li class="treeview">
                <a href="{{ route('admin.tasks.index') }}">
                    <i data-feather="tasks"></i>
                    <span>{{ __('system.nav_tasks') }}</span>
                </a>
                <ul class="treeview-menu">
{{--                    <li>--}}
{{--                        <a href="{{ route('calendar.index') }}">--}}
{{--                            <i class="fa fa-cogs" ></i>--}}
{{--                            <span>{{ __('system.nav_calendar') }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="{{ route('admin.tasks.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_tasks') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.documents.index') }}">
                    <i data-feather="documents"></i>
                    <span>{{ __('system.nav_documents') }}</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.documents_categories.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_documents_categories') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.documents.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_documents') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{--Użytkownicy--}}
            <li class="treeview">
                <a href="{{ route('admin.users.index') }}">
                    <i data-feather="users"></i>
                    <span>{{ __('users.all_users') }}</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_users_settings') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span>{{ __('system.nav_roles_settings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{--wyloguj--}}
            <li>
                <a href="{{ route('admin.logout') }}">
                    <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                    <span>Wyloguj</span>
                </a>
            </li>

        </ul>
    </section>
</aside>
