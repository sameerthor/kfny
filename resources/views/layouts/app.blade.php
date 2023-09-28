<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    @guest
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/kfnythemes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet">
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    @endguest

</head>

<body>
    <div id="app">
        @guest
        @yield('content')
        @else
        <main class="kfnythemes">
            <!-- header  html start -->
            <header>
                <div class="container-fluid">
                    <div class="kfnythemes_container">
                        <div class="row">
                            <div class="col-3">
                                <div class="kfnythems_logo">
                                    <img src="/images/Logo/logo.svg" />
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="kfnythemes_notification_icon">
                                    <i class="bi bi-bell"></i>
                                </div>
                                <div class="kfnythemes_admin">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="kfnythemes_admin_proifle">
                                                <img src="/images/Profile/admin.svg" />
                                            </span>
                                            <span class="kfnythemes_admin_name">
                                                Alexander Black
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li>
                                                <a class="dropdown-item" href="#">Another action</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- header html  end -->

            <div class="container-fluid">
                <div class="kfnythemes_container">
                    <div class="row">
                        <!-- left menu list html start -->
                        <div class="menu_section">
                            <a href="{{URL('/')}}">
                                <div class="menu_section_item {{ request()->routeIs('dashboard') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M9.00002 15.5V7.16667H15.6667V15.5H9.00002ZM0.666687 8.83333V0.5H7.33335V8.83333H0.666687ZM5.66669 7.16667V2.16667H2.33335V7.16667H5.66669ZM0.666687 15.5V10.5H7.33335V15.5H0.666687ZM2.33335 13.8333H5.66669V12.1667H2.33335V13.8333ZM10.6667 13.8333H14V8.83333H10.6667V13.8333ZM9.00002 0.5H15.6667V5.5H9.00002V0.5ZM10.6667 2.16667V3.83333H14V2.16667H10.6667Z" />
                                        </svg>
                                    </div>
                                    <div class="menu_name">Dashboard</div>
                                </div>
                            </a>

                            <a href="{{URL('/trials')}}">
                                <div class="menu_section_item {{ request()->routeIs('trials') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_737)">
                                                <path d="M11.6667 16.6667V18.3333H1.66669V16.6667H11.6667ZM12.155 0.571655L18.6367 7.05332L17.4584 8.23332L16.575 7.93832L14.5109 9.99999L19.225 14.7142L18.0467 15.8925L13.3334 11.1783L11.33 13.1817L11.5659 14.125L10.3867 15.3033L3.90502 8.82166L5.08419 7.64332L6.02585 7.87832L11.2709 2.63416L10.9767 1.75082L12.155 0.571655ZM12.7442 3.51832L6.85169 9.40999L9.79752 12.3567L15.69 6.46499L12.7442 3.51832Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_737">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Motions/Trials</div>
                                </div>
                            </a>

                            <a href="{{URL('/invoices')}}">
                                <div class="menu_section_item {{ request()->routeIs('invoices') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_721)">
                                                <path d="M16.6667 18.3333H3.33333C3.11232 18.3333 2.90036 18.2455 2.74408 18.0892C2.5878 17.933 2.5 17.721 2.5 17.5V2.49999C2.5 2.27898 2.5878 2.06701 2.74408 1.91073C2.90036 1.75445 3.11232 1.66666 3.33333 1.66666H16.6667C16.8877 1.66666 17.0996 1.75445 17.2559 1.91073C17.4122 2.06701 17.5 2.27898 17.5 2.49999V17.5C17.5 17.721 17.4122 17.933 17.2559 18.0892C17.0996 18.2455 16.8877 18.3333 16.6667 18.3333ZM15.8333 16.6667V3.33332H4.16667V16.6667H15.8333ZM6.66667 7.49999H13.3333V9.16666H6.66667V7.49999ZM6.66667 10.8333H13.3333V12.5H6.66667V10.8333Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_721">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Invoices</div>
                                </div>
                            </a>

                            <a href="{{URL('/reports')}}">
                                <div class="menu_section_item {{ request()->routeIs('reports') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_728)">
                                                <path d="M4.16667 6.66666V16.6667H15.8333V6.66666H4.16667ZM4.16667 4.99999H15.8333V3.33332H4.16667V4.99999ZM16.6667 18.3333H3.33333C3.11232 18.3333 2.90036 18.2455 2.74408 18.0892C2.5878 17.933 2.5 17.721 2.5 17.5V2.49999C2.5 2.27898 2.5878 2.06701 2.74408 1.91073C2.90036 1.75445 3.11232 1.66666 3.33333 1.66666H16.6667C16.8877 1.66666 17.0996 1.75445 17.2559 1.91073C17.4122 2.06701 17.5 2.27898 17.5 2.49999V17.5C17.5 17.721 17.4122 17.933 17.2559 18.0892C17.0996 18.2455 16.8877 18.3333 16.6667 18.3333ZM5.83333 8.33332H9.16667V11.6667H5.83333V8.33332ZM5.83333 13.3333H14.1667V15H5.83333V13.3333ZM10.8333 9.16666H14.1667V10.8333H10.8333V9.16666Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_728">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Reports</div>
                                </div>

                            </a>

                            <a href="{{URL('/calender')}}">
                                <div class="menu_section_item {{ request()->routeIs('calender') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_731)">
                                                <path d="M14.1667 2.50001H17.5C17.721 2.50001 17.933 2.58781 18.0893 2.74409C18.2456 2.90037 18.3334 3.11233 18.3334 3.33334V16.6667C18.3334 16.8877 18.2456 17.0997 18.0893 17.2559C17.933 17.4122 17.721 17.5 17.5 17.5H2.50002C2.27901 17.5 2.06704 17.4122 1.91076 17.2559C1.75448 17.0997 1.66669 16.8877 1.66669 16.6667V3.33334C1.66669 3.11233 1.75448 2.90037 1.91076 2.74409C2.06704 2.58781 2.27901 2.50001 2.50002 2.50001H5.83335V0.833344H7.50002V2.50001H12.5V0.833344H14.1667V2.50001ZM16.6667 9.16668H3.33335V15.8333H16.6667V9.16668ZM12.5 4.16668H7.50002V5.83334H5.83335V4.16668H3.33335V7.50001H16.6667V4.16668H14.1667V5.83334H12.5V4.16668ZM5.00002 10.8333H6.66669V12.5H5.00002V10.8333ZM9.16669 10.8333H10.8334V12.5H9.16669V10.8333ZM13.3334 10.8333H15V12.5H13.3334V10.8333Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_731">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Calendar</div>
                                </div>

                            </a>

                            <a href="{{URL('/data-management')}}">
                                <div class="menu_section_item {{ request()->routeIs('data-management') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_742)">
                                                <path d="M2.50002 2.5H17.5C17.721 2.5 17.933 2.5878 18.0893 2.74408C18.2456 2.90036 18.3334 3.11232 18.3334 3.33333V16.6667C18.3334 16.8877 18.2456 17.0996 18.0893 17.2559C17.933 17.4122 17.721 17.5 17.5 17.5H2.50002C2.27901 17.5 2.06704 17.4122 1.91076 17.2559C1.75448 17.0996 1.66669 16.8877 1.66669 16.6667V3.33333C1.66669 3.11232 1.75448 2.90036 1.91076 2.74408C2.06704 2.5878 2.27901 2.5 2.50002 2.5ZM3.33335 4.16667V15.8333H16.6667V4.16667H3.33335ZM14.0834 10.8333C13.8743 11.8428 13.2985 12.739 12.4673 13.3487C11.6361 13.9585 10.6084 14.2387 9.58276 14.1351C8.55709 14.0315 7.60619 13.5515 6.91373 12.7878C6.22127 12.0241 5.83636 11.0309 5.83335 10C5.83347 9.03954 6.16527 8.10859 6.77264 7.36455C7.38001 6.62052 8.22569 6.10907 9.16669 5.91667V10.8333H14.0834ZM14.0834 9.16667H10.8334V5.91667C11.6338 6.08058 12.3685 6.47595 12.9463 7.05372C13.5241 7.63148 13.9194 8.36619 14.0834 9.16667Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_742">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Data Management</div>
                                </div>

                            </a>

                            <a href="{{URL('/eou')}}">
                                <div class="menu_section_item {{ request()->routeIs('eou') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_676)">
                                                <path d="M11.6667 16.6667V18.3333H1.66669V16.6667H11.6667ZM12.155 0.571671L18.6367 7.05334L17.4584 8.23334L16.575 7.93834L14.5109 10L19.225 14.7142L18.0467 15.8925L13.3334 11.1783L11.33 13.1817L11.5659 14.125L10.3867 15.3033L3.90502 8.82167L5.08419 7.64334L6.02585 7.87834L11.2709 2.63417L10.9767 1.75084L12.155 0.571671ZM12.7442 3.51834L6.85169 9.41L9.79752 12.3567L15.69 6.465L12.7442 3.51834Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_676">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">EUO</div>
                                </div>

                            </a>

                            <a href="{{URL('/tasks')}}">
                                <div class="menu_section_item {{ request()->routeIs('tasks') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_725)">
                                                <path d="M17.5 2.49334V17.5067C17.4983 17.7255 17.4105 17.9349 17.2557 18.0896C17.1008 18.2443 16.8914 18.3318 16.6725 18.3333H3.3275C3.10818 18.3333 2.89783 18.2463 2.74266 18.0913C2.5875 17.9363 2.50022 17.726 2.5 17.5067V2.49334C2.50175 2.27449 2.58951 2.06511 2.74435 1.91043C2.89918 1.75576 3.10865 1.6682 3.3275 1.66667H16.6725C17.1292 1.66667 17.5 2.03667 17.5 2.49334ZM15.8333 3.33334H4.16667V16.6667H15.8333V3.33334ZM9.41083 10.9342L12.9467 7.39917L14.125 8.57751L9.41083 13.2917L6.16917 10.05L7.34833 8.87167L9.41083 10.9342Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_725">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Tasks</div>
                                </div>

                            </a>

                            <a href="Tasks.html">
                                <div class="menu_section_item">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_748)">
                                                <path d="M1.66669 3.3275C1.66821 3.10865 1.75577 2.89918 1.91045 2.74435C2.06512 2.58951 2.2745 2.50175 2.49335 2.5H17.5067C17.9634 2.5 18.3334 2.87083 18.3334 3.3275V16.6725C18.3318 16.8914 18.2443 17.1008 18.0896 17.2557C17.9349 17.4105 17.7255 17.4983 17.5067 17.5H2.49335C2.27403 17.4998 2.06377 17.4125 1.90876 17.2573C1.75376 17.1022 1.66669 16.8918 1.66669 16.6725V3.3275ZM3.33335 4.16667V15.8333H16.6667V4.16667H3.33335ZM5.00002 5.83333H10V10.8333H5.00002V5.83333ZM6.66669 7.5V9.16667H8.33335V7.5H6.66669ZM5.00002 12.5H15V14.1667H5.00002V12.5ZM11.6667 5.83333H15V7.5H11.6667V5.83333ZM11.6667 9.16667H15V10.8333H11.6667V9.16667Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_748">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Templates</div>
                                </div>

                            </a>


                            <a href="">
                                <div class="menu_section_item">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_751)">
                                                <path d="M3.1525 2.355L10 0.833332L16.8475 2.355C17.0326 2.39614 17.198 2.49914 17.3167 2.647C17.4353 2.79487 17.5 2.97876 17.5 3.16833V11.4908C17.4999 12.3139 17.2967 13.1243 16.9082 13.85C16.5198 14.5757 15.9582 15.1943 15.2733 15.6508L10 19.1667L4.72667 15.6508C4.04189 15.1944 3.48038 14.5759 3.09196 13.8504C2.70353 13.1248 2.5002 12.3146 2.5 11.4917V3.16833C2.50003 2.97876 2.5647 2.79487 2.68332 2.647C2.80195 2.49914 2.96745 2.39614 3.1525 2.355ZM4.16667 3.83667V11.4908C4.16668 12.0395 4.30215 12.5798 4.56105 13.0636C4.81996 13.5474 5.19429 13.9598 5.65083 14.2642L10 17.1642L14.3492 14.2642C14.8056 13.9598 15.1799 13.5476 15.4388 13.0639C15.6977 12.5803 15.8332 12.0402 15.8333 11.4917V3.83667L10 2.54167L4.16667 3.83667Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_751">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Security</div>
                                </div>

                            </a>

                            <a href="">
                                <div class="menu_section_item">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_75_754)">
                                                <path d="M6.66667 3.33333H17.5V5H6.66667V3.33333ZM2.5 2.91667H5V5.41667H2.5V2.91667ZM2.5 8.75H5V11.25H2.5V8.75ZM2.5 14.5833H5V17.0833H2.5V14.5833ZM6.66667 9.16667H17.5V10.8333H6.66667V9.16667ZM6.66667 15H17.5V16.6667H6.66667V15Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_75_754">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Features/Functions</div>
                                </div>

                            </a>

                            <a href="{{URL('/settlements')}}">
                                <div class="menu_section_item {{ request()->routeIs('settlements') ? 'kfny_active' : ''  }}">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_77_757)">
                                                <path d="M1.66669 18.3333C1.66669 16.5652 2.36907 14.8695 3.61931 13.6193C4.86955 12.369 6.56524 11.6667 8.33335 11.6667C10.1015 11.6667 11.7972 12.369 13.0474 13.6193C14.2976 14.8695 15 16.5652 15 18.3333H13.3334C13.3334 17.0072 12.8066 15.7355 11.8689 14.7978C10.9312 13.8601 9.65944 13.3333 8.33335 13.3333C7.00727 13.3333 5.7355 13.8601 4.79782 14.7978C3.86014 15.7355 3.33335 17.0072 3.33335 18.3333H1.66669ZM8.33335 10.8333C5.57085 10.8333 3.33335 8.59583 3.33335 5.83333C3.33335 3.07083 5.57085 0.833332 8.33335 0.833332C11.0959 0.833332 13.3334 3.07083 13.3334 5.83333C13.3334 8.59583 11.0959 10.8333 8.33335 10.8333ZM8.33335 9.16667C10.175 9.16667 11.6667 7.675 11.6667 5.83333C11.6667 3.99167 10.175 2.5 8.33335 2.5C6.49169 2.5 5.00002 3.99167 5.00002 5.83333C5.00002 7.675 6.49169 9.16667 8.33335 9.16667ZM15.2367 12.2525C16.4078 12.7799 17.4017 13.6344 18.0988 14.7131C18.796 15.7918 19.1668 17.0489 19.1667 18.3333H17.5C17.5002 17.37 17.2221 16.4271 16.6993 15.618C16.1764 14.8089 15.4309 14.168 14.5525 13.7725L15.2359 12.2525H15.2367ZM14.6634 2.84417C15.503 3.19025 16.2208 3.77795 16.7259 4.53269C17.2309 5.28743 17.5004 6.1752 17.5 7.08333C17.5004 8.22694 17.0731 9.32935 16.3021 10.174C15.5312 11.0187 14.4722 11.5446 13.3334 11.6483V9.97083C13.9508 9.8824 14.5236 9.59835 14.9678 9.16038C15.4119 8.72241 15.7039 8.1536 15.801 7.53744C15.898 6.92129 15.795 6.29025 15.507 5.73696C15.219 5.18367 14.7612 4.73729 14.2009 4.46333L14.6634 2.84417Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_77_757">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Settlements</div>
                                </div>

                            </a>

                            <a href="">
                                <div class="menu_section_item">
                                    <div class="menu_icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <g clip-path="url(#clip0_77_760)">
                                                <path d="M2.78332 14.1667C2.43105 13.5575 2.15721 12.9062 1.96832 12.2283C2.37941 12.0193 2.72465 11.7005 2.96585 11.3074C3.20704 10.9143 3.33479 10.4621 3.33497 10.0009C3.33514 9.53973 3.20773 9.08746 2.96682 8.69417C2.72592 8.30088 2.38092 7.9819 1.96999 7.7725C2.34669 6.41041 3.06393 5.16663 4.05416 4.15834C4.4409 4.40978 4.88967 4.54931 5.3508 4.56149C5.81194 4.57367 6.26745 4.45803 6.66693 4.22737C7.06641 3.9967 7.39428 3.66 7.61426 3.25454C7.83424 2.84907 7.93774 2.39065 7.91332 1.93C9.28175 1.57636 10.7177 1.57693 12.0858 1.93167C12.0616 2.39231 12.1653 2.85066 12.3855 3.25601C12.6056 3.66136 12.9336 3.9979 13.3332 4.22839C13.7327 4.45888 14.1883 4.57433 14.6494 4.56196C15.1105 4.5496 15.5592 4.40991 15.9458 4.15834C16.4283 4.65 16.8567 5.20917 17.2167 5.83334C17.5775 6.45751 17.8475 7.10834 18.0317 7.77167C17.6206 7.98076 17.2753 8.29948 17.0341 8.69259C16.7929 9.0857 16.6652 9.53787 16.665 9.99908C16.6648 10.4603 16.7923 10.9125 17.0332 11.3058C17.2741 11.6991 17.6191 12.0181 18.03 12.2275C17.6533 13.5896 16.936 14.8334 15.9458 15.8417C15.5591 15.5902 15.1103 15.4507 14.6492 15.4385C14.188 15.4263 13.7325 15.542 13.333 15.7726C12.9336 16.0033 12.6057 16.34 12.3857 16.7455C12.1657 17.1509 12.0622 17.6094 12.0867 18.07C10.7182 18.4237 9.2823 18.4231 7.91416 18.0683C7.93836 17.6077 7.83465 17.1493 7.61451 16.744C7.39436 16.3386 7.06636 16.0021 6.6668 15.7716C6.26724 15.5411 5.8117 15.4257 5.35059 15.438C4.88949 15.4504 4.44079 15.5901 4.05416 15.8417C3.56165 15.3391 3.13465 14.7763 2.78332 14.1667ZM7.49999 14.33C8.38801 14.8422 9.05569 15.6642 9.37499 16.6383C9.79082 16.6775 10.2083 16.6783 10.6242 16.6392C10.9437 15.6649 11.6117 14.8429 12.5 14.3308C13.3877 13.8172 14.4338 13.6496 15.4375 13.86C15.6792 13.52 15.8875 13.1575 16.0608 12.7783C15.377 12.0145 14.9993 11.0252 15 10C15 8.95 15.3917 7.96917 16.0608 7.22167C15.8863 6.84263 15.677 6.48053 15.4358 6.14001C14.4327 6.35026 13.3873 6.1829 12.5 5.67C11.612 5.15781 10.9443 4.33582 10.625 3.36167C10.2092 3.3225 9.79166 3.32167 9.37582 3.36084C9.05632 4.33513 8.38833 5.15714 7.49999 5.66917C6.61231 6.18277 5.56622 6.35044 4.56249 6.14001C4.32129 6.48024 4.1126 6.84239 3.93916 7.22167C4.62296 7.98547 5.00073 8.97483 4.99999 10C4.99999 11.05 4.60832 12.0308 3.93916 12.7783C4.11372 13.1574 4.32294 13.5195 4.56416 13.86C5.56725 13.6497 6.61266 13.8171 7.49999 14.33ZM9.99999 12.5C9.33695 12.5 8.70106 12.2366 8.23222 11.7678C7.76338 11.2989 7.49999 10.663 7.49999 10C7.49999 9.33696 7.76338 8.70108 8.23222 8.23224C8.70106 7.7634 9.33695 7.50001 9.99999 7.50001C10.663 7.50001 11.2989 7.7634 11.7678 8.23224C12.2366 8.70108 12.5 9.33696 12.5 10C12.5 10.663 12.2366 11.2989 11.7678 11.7678C11.2989 12.2366 10.663 12.5 9.99999 12.5ZM9.99999 10.8333C10.221 10.8333 10.433 10.7455 10.5892 10.5893C10.7455 10.433 10.8333 10.221 10.8333 10C10.8333 9.77899 10.7455 9.56703 10.5892 9.41075C10.433 9.25447 10.221 9.16667 9.99999 9.16667C9.77898 9.16667 9.56701 9.25447 9.41073 9.41075C9.25445 9.56703 9.16666 9.77899 9.16666 10C9.16666 10.221 9.25445 10.433 9.41073 10.5893C9.56701 10.7455 9.77898 10.8333 9.99999 10.8333Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_77_760">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="menu_name">Settings</div>
                                </div>

                            </a>

                        </div>
                        <!-- left menu list html end -->

                        <!-- main container htnl start -->
                        <div class="main_container">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endguest
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</html>