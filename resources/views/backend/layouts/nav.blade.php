  <!-- BEGIN LOADER -->
  <div id="load_screen">
      <div class="loader">
          <div class="loader-content">
              <div class="spinner-grow align-self-center"></div>
          </div>
      </div>
  </div>


  <div class="header-container fixed-top">
      <header class="header navbar navbar-expand-sm">

          <ul class="navbar-nav theme-brand flex-row  text-center">

              <li class="nav-item theme-text w-auto">
                  <a href="/" class="nav-link">
                      <img src="{{ asset('backend/images/channel-logo-white.svg') }}" class="navbar-logo img-fluid"
                          alt="logo" style="width: 150px">
                  </a>
              </li>
              <li class="nav-item toggle-sidebar">
                  <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path d="M4 4.15381H21" stroke="white" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                          <path d="M4 12H21" stroke="white" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                          <path d="M4 19.8462H21" stroke="white" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                      </svg>
                  </a>
              </li>
          </ul>

          <ul class="navbar-item flex-row search-ul">

          </ul>
          <ul class="navbar-item flex-row navbar-dropdown">

              <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                  <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-settings">
                          <circle cx="12" cy="12" r="3"></circle>
                          <path
                              d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                          </path>
                      </svg>
                  </a>
                  <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                      <div class="user-profile-section">
                          <div class="media mx-auto">
                              <img src="assets/img/90x90.svg" class="img-fluid mr-2" alt="avatar">
                              <div class="media-body">
                                  <h5>{{ ucfirst(auth()->user()->name) }}</h5>
                                  <h5>{{ ucfirst(auth()->user()->role) }}</h5>
                                  <!-- <p>Project Leader</p> -->
                              </div>
                          </div>
                      </div>
                      <div class="dropdown-item">
                          <a href="{{ route('cms.changePassword.index') }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                              </svg> <span>Change Password</span>
                          </a>
                      </div>

                      <div class="dropdown-item">
                          <a href="{{ route('cms.logout') }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="feather feather-log-out">
                                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                  <polyline points="16 17 21 12 16 7"></polyline>
                                  <line x1="21" y1="12" x2="9" y2="12"></line>
                              </svg> <span>Log Out</span>
                          </a>
                      </div>
                  </div>
              </li>
          </ul>
      </header>
  </div>
  <!--  END NAVBAR  -->

  <!--  BEGIN MAIN CONTAINER  -->
  <div class="main-container" id="container">
      <div class="overlay"></div>
      <div class="search-overlay"></div>
      <!--  BEGIN SIDEBAR  -->
      <div class="sidebar-wrapper sidebar-theme">
          <nav id="sidebar">
              <ul class="list-unstyled menu-categories" id="accordionExample">
                  {{-- <li class="menu">
                      <a href="{{ route('cms.calendar.index') }}"
                          aria-expanded="{{ route('cms.calendar.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                  <rect x="3" y="4" width="18" height="18" rx="2"
                                      ry="2"></rect>
                                  <line x1="16" y1="2" x2="16" y2="6"></line>
                                  <line x1="8" y1="2" x2="8" y2="6"></line>
                                  <line x1="3" y1="10" x2="21" y2="10"></line>
                              </svg>
                              <span>Calendar</span>
                          </div>
                      </a>
                  </li> --}}
                  {{-- @admin() --}}
                  {{-- <li class="menu">
                          <a href="{{ route('cms.statistics.index') }}"
                              aria-expanded="{{ route('cms.statistics.index') == request()->url() ? 'true' : 'false' }}"
                              class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                  </svg>
                                  <span>Dashboard</span>
                              </div>
                          </a>
                        </li>
                        @endadmin
                  <li class="menu">
                      <a href="{{ route('cms.patients.index') }}"
                      aria-expanded="{{ route('cms.patients.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="9" cy="7" r="4"></circle>
                                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Patients</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('cms.appointments.index') }}"
                        aria-expanded="{{ route('cms.appointments.index') == request()->url() ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                  <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                  </path>
                                  <rect x="8" y="2" width="8" height="4" rx="1"
                                      ry="1"></rect>
                              </svg>
                              <span>Appointments</span>
                          </div>
                      </a>
                  </li>
                    <li class="menu">
                        <a href="{{ route('cms.tempappointment.index') }}"
                            aria-expanded="{{ route('cms.tempappointment.index') == request()->url() ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">
                                <i class='bx bx-folder-open'></i>
                                <span>Temporary Appointment</span>
                            </div>
                        </a>
                    </li>
                  <li class="menu">
                      <a href="{{ route('cms.followups.index') }}"
                          aria-expanded="{{ route('cms.followups.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-fast-forward">
                                  <polygon points="13 19 22 12 13 5 13 19"></polygon>
                                  <polygon points="2 19 11 12 2 5 2 19"></polygon>
                              </svg>

                              <span>Follow Ups</span>
                          </div>
                      </a>
                    </li>
                    <li class="menu">
                      <a href="{{ route('cms.surgery.index') }}"
                          aria-expanded="{{ route('cms.surgery.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <i class='bx bx-cut'></i>
                              <span>Surgeries</span>
                          </div>
                      </a>
                      <li class="menu">
                          <a href="{{ route('cms.dischargecard.index') }}"
                              aria-expanded="{{ route('cms.dischargecard.index') == request()->url() ? 'true' : 'false' }}"
                              class="dropdown-toggle">
                              <div class="">
                                  <i class='bx bx-file'></i>
                                  <span>Discharge Cards</span>
                                </div>
                            </a>
                        </li>
                    </li>
                    <li class="menu">
                        <a href="{{ route('cms.surgerybill.index') }}"
                            aria-expanded="{{ route('cms.surgerybill.index') == request()->url() ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">

                                <i class='bx bx-rupee'></i> <span>Surgery Bills</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('cms.expenses.index') }}"
                        aria-expanded="{{ route('cms.expenses.index') == request()->url() ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <i class='bx bxs-store'></i>
                            <span>Inventory</span>
                        </div>
                    </a>
                </li> --}}


                  {{-- @admin()
                      <li class="menu">
                          <a href="{{ route('cms.medicine.index') }}"
                              aria-expanded="{{ route('cms.medicine.index') == request()->url() ? 'true' : 'false' }}"
                              class="dropdown-toggle">
                              <div class="">
                                  <i class='bx bx-capsule'></i>
                                  <span>Medicines</span>
                              </div>
                          </a>
                      </li>
                      <li class="menu">
                          <a href="{{ route('cms.expensesmaster.index') }}"
                              aria-expanded="{{ route('cms.expensesmaster.index') == request()->url() ? 'true' : 'false' }}"
                              class="dropdown-toggle">
                              <div class="">
                                  <i class='bx bxs-bar-chart-alt-2'></i>
                                  <span>Expenses Master</span>
                              </div>
                          </a>
                      </li>
                      <li class="menu">
                          <a href="{{ route('cms.subexpensesmaster.index') }}"
                              aria-expanded="{{ route('cms.subexpensesmaster.index') == request()->url() ? 'true' : 'false' }}"
                              class="dropdown-toggle">
                              <div class="">
                                  <i class='bx bx-bar-chart'></i>

                                  <span>Sub Expenses Master</span>
                              </div>
                          </a>
                      </li>
                  @endadmin --}}

                  {{-- <li class="menu">
                      <a href="{{ route('cms.export.index') }}"
                          aria-expanded="{{ route('cms.export.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                  <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                  <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                  <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                              </svg>
                              <span>Export Data</span>
                          </div>
                      </a>
                  </li> --}}

                  {{-- @admin()
                      <li class="menu">
                          <a href="{{ route('cms.user.index') }}"
                              aria-expanded="{{ route('cms.user.index') == request()->url() ? 'true' : 'false' }}"
                              class="dropdown-toggle">
                              <div class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                      <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                      <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                      <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                  </svg>
                                  <span>Users</span>
                                </div>
                            </a>
                      </li>
                  @endadmin --}}
                  <li class="menu">
                      <a href="{{ route('cms.statistics.index') }}"
                          aria-expanded="{{ route('cms.statistics.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path d="M3,11H11V3H3M3,21H11V13H3M13,21H21V13H13M13,3V11H21V3" />
                              </svg>
                              <span>Dashboard</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.user.index') }}"
                          aria-expanded="{{ route('backend.user.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                              </svg>
                              <span>Users</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.product.index') }}"
                          aria-expanded="{{ route('backend.product.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z" />
                              </svg>
                              <span>Products</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.order.index') }}"
                          aria-expanded="{{ route('backend.order.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />
                              </svg>
                              <span>Orders</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.transaction.index') }}"
                          aria-expanded="{{ route('backend.transaction.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M2,3H22C23.05,3 24,3.95 24,5V19C24,20.05 23.05,21 22,21H2C0.95,21 0,20.05 0,19V5C0,3.95 0.95,3 2,3M14,6V7H22V6H14M14,8V9H21.5L22,9V8H14M14,10V11H21V10H14M8,13.91C6,13.91 2,15 2,17V18H14V17C14,15 10,13.91 8,13.91M8,6A3,3 0 0,0 5,9A3,3 0 0,0 8,12A3,3 0 0,0 11,9A3,3 0 0,0 8,6Z" />
                              </svg>
                              <span>Transactions</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.category.index') }}"
                          aria-expanded="{{ route('backend.category.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M12 0L3 7L4.63 8.27L12 14L19.36 8.27L21 7L12 0M19.37 10.73L12 16.47L4.62 10.74L3 12L12 19L21 12L19.37 10.73M19.37 15.73L12 21.47L4.62 15.74L3 17L12 24L21 17L19.37 15.73Z" />
                              </svg>
                              <span>Categories</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.sub_category.index') }}"
                          aria-expanded="{{ route('backend.sub_category.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M12,16L19.36,10.27L21,9L12,2L3,9L4.63,10.27M12,18.54L4.62,12.81L3,14.07L12,21.07L21,14.07L19.37,12.8L12,18.54Z" />
                              </svg>
                              <span>Sub Categories</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.brand.index') }}"
                          aria-expanded="{{ route('backend.brand.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M5.5,9A1.5,1.5 0 0,0 7,7.5A1.5,1.5 0 0,0 5.5,6A1.5,1.5 0 0,0 4,7.5A1.5,1.5 0 0,0 5.5,9M17.41,11.58C17.77,11.94 18,12.44 18,13C18,13.55 17.78,14.05 17.41,14.41L12.41,19.41C12.05,19.77 11.55,20 11,20C10.45,20 9.95,19.78 9.58,19.41L2.59,12.42C2.22,12.05 2,11.55 2,11V6C2,4.89 2.89,4 4,4H9C9.55,4 10.05,4.22 10.41,4.58L17.41,11.58M13.54,5.71L14.54,4.71L21.41,11.58C21.78,11.94 22,12.45 22,13C22,13.55 21.78,14.05 21.42,14.41L16.04,19.79L15.04,18.79L20.75,13L13.54,5.71Z" />
                              </svg>
                              <span>Brands</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.attribute.index') }}"
                          aria-expanded="{{ route('backend.attribute.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                              </svg>
                              <span>Attributes</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.product_attribute_value.index') }}"
                          aria-expanded="{{ route('backend.product_attribute_value.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                              </svg>
                              <span>Product Attribute Values</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.coupon.index') }}"
                          aria-expanded="{{ route('backend.coupon.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M4,4A2,2 0 0,0 2,6V10C3.11,10 4,10.9 4,12A2,2 0 0,1 2,14V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V14A2,2 0 0,1 20,12C20,10.89 20.9,10 22,10V6C22,4.89 21.1,4 20,4H4M15.5,7L17,8.5L8.5,17L7,15.5L15.5,7M8.81,7.04C9.79,7.04 10.58,7.83 10.58,8.81A1.77,1.77 0 0,1 8.81,10.58C7.83,10.58 7.04,9.79 7.04,8.81A1.77,1.77 0 0,1 8.81,7.04M15.19,13.42C16.17,13.42 16.96,14.21 16.96,15.19A1.77,1.77 0 0,1 15.19,16.96C14.21,16.96 13.42,16.17 13.42,15.19A1.77,1.77 0 0,1 15.19,13.42Z" />
                              </svg>
                              <span>Coupons</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.slider.index') }}"
                          aria-expanded="{{ route('backend.slider.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path
                                      d="M3,17V19H9V17H3M3,5V7H13V5H3M13,21V19H21V17H13V15H11V21H13M7,9V11H3V13H7V15H9V9H7M21,13V11H11V13H21M15,9H17V7H21V5H17V3H15V9Z" />
                              </svg>
                              <span>Sliders</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="{{ route('backend.showcase.index') }}"
                          aria-expanded="{{ route('backend.showcase.index') == request()->url() ? 'true' : 'false' }}"
                          class="dropdown-toggle">
                          <div class="">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M12,18H6V14H12M21,14V12L20,7H4L3,12V14H4V20H14V14H18V20H20V14M20,4H4V6H20V4Z" />
                              </svg>
                              <span>Showcases</span>
                          </div>
                      </a>
                  </li>
                  <li class="menu">
                      <a href="" aria-expanded="true">

                      </a>
                  </li>
              </ul>

          </nav>

      </div>
      <!--  END SIDEBAR  -->
