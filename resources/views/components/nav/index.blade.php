  <!-- Navbar -->
  <nav :class="{
      'ltr:left-64 ltr:-right-64 md:ltr:left-0 md:ltr:right-0 rtl:right-64 rtl:-left-64 md:rtl:right-0 md:rtl:left-0': open,
      'ltr:left-0 ltr:right-0 md:ltr:left-64 rtl:right-0 rtl:left-0 md:rtl:right-64':
          !(open)
  }"
      class="fixed z-50 mt-0 flex flex-row flex-nowrap items-center justify-between bg-white py-2 px-6 shadow-md transition-all duration-500 ease-in-out ltr:left-0 ltr:right-0 rtl:right-0 rtl:left-0 dark:bg-gray-800 md:ltr:left-64 md:rtl:right-64"
      id="desktop-menu">
      <!-- sidenav button-->
      <button id="navbartoggle" type="button"
          class="inline-flex items-center justify-center text-gray-800 hover:text-gray-600 focus:outline-none focus:ring-0 dark:text-gray-300 dark:hover:text-gray-200"
          aria-controls="sidebar-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
          <span class="sr-only">Mobile menu</span>
          <svg x-description="Icon open" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-8 w-8"
              :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 16 16">
              <path class="hidden md:block" fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
              </path>
              <path class="md:hidden"
                  d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
              </path>
          </svg>

          <svg x-description="Icon closed" x-state:on="Menu open" x-state:off="Menu closed" class="block h-8 w-8"
              :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 16 16">
              <path class="md:hidden" fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
              </path>
              <path class="hidden md:block"
                  d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
              </path>
          </svg>
          <!-- <i class="fas fa-bars text-2xl"></i> -->
      </button>

      <!-- Search -->
      {{-- <form class="mx-5 hidden w-full sm:inline-block md:hidden lg:inline-block">
          <div class="relative flex w-full flex-wrap items-stretch">
              <input type="text"
                  class="relative max-w-full flex-shrink flex-shrink flex-grow overflow-x-auto border border-gray-100 bg-gray-100 py-2 px-4 text-sm leading-5 text-gray-800 focus:border-gray-200 focus:outline-none focus:ring-0 ltr:rounded-l rtl:rounded-r dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:focus:border-gray-600"
                  placeholder="Search…" aria-label="Search">
              <div class="-mr-px flex">
                  <button
                      class="flex items-center border border-indigo-500 bg-indigo-500 py-2 px-4 leading-5 text-gray-100 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white hover:ring-0 focus:border-indigo-600 focus:bg-indigo-600 focus:outline-none focus:ring-0 ltr:-ml-1 ltr:rounded-r rtl:-mr-1 rtl:rounded-l"
                      type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                          <circle cx="11" cy="11" r="8"></circle>
                          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                      </svg>
                      <!-- <i class="fas fa-search"></i> -->
                  </button>
              </div>
          </div>
      </form> --}}

      <!-- menu -->
      <ul class="mt-2 mt-0 flex ltr:ml-auto rtl:mr-auto">
          <li x-cloack class="relative" @click="toggleDarkMode()" x-show="!isDark" style="display: none"
              x-transition:enter="transition ease-out duration-500 transform"
              x-transition:enter-start="opacity-0 rotate-90 scale-90"
              x-transition:enter-end="opacity-100 rotate-0 scale-100"
              x-transition:leave="transition ease-in duration-500 transform"
              x-transition:leave-start="opacity-100 rotate-0 scale-100"
              x-transition:leave-end="opacity-0 rotate-90 scale-90" x-cloak>
              <a href="javascript:;" class="block flex rounded-full py-3 px-4 text-sm focus:outline-none"
                  id="messages">
                  <div class="relative mx-auto my-auto inline-block">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                          </path>
                      </svg>
                  </div>
              </a>
          </li>

          <li class="relative" @click="toggleDarkMode()" x-show="isDark" style="display: none"
              x-transition:enter="transition ease-out duration-500 transform"
              x-transition:enter-start="opacity-0 rotate-90 scale-90"
              x-transition:enter-end="opacity-100 rotate-0 scale-100"
              x-transition:leave="transition ease-in duration-500 transform"
              x-transition:leave-start="opacity-100 rotate-0 scale-100"
              x-transition:leave-end="opacity-0 rotate-90 scale-90" x-cloak>
              <a href="javascript:;" class="block flex rounded-full py-3 px-4 text-sm focus:outline-none"
                  id="messages">
                  <div class="relative mx-auto my-auto inline-block">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                          </path>
                      </svg>
                  </div>
              </a>
          </li>

          <!-- notification -->

          <!-- profile -->
          <li x-data="{ open: false }" class="relative">
              <a href="javascript:;" class="flex rounded-full px-3 text-sm focus:outline-none" id="user-menu-button"
                  @click="open = ! open">
                  <div class="relative">
                      {{-- <img class="h-10 w-10 rounded-full border border-gray-700 bg-gray-700"
                          src="src/img/avatar/avatar.png" alt="avatar"> --}}
                      <svg class="mr-2 h-10 w-10 text-gray-200 dark:text-gray-700" aria-hidden="true"
                          fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                              clip-rule="evenodd"></path>
                      </svg>
                      <span title="online"
                          class="absolute -bottom-0.5 flex h-3 w-3 justify-center rounded-full border border-white bg-green-500 text-center ltr:right-1 rtl:left-1"></span>
                  </div>
                  <span class="hidden self-center ltr:ml-1 rtl:mr-1 md:block">{{ auth()->user()->name }}</span>
              </a>
              <ul x-show="open" @click.away="open = false" x-transition:enter="transition-all duration-200 ease-out"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition-all duration-200 ease-in"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="absolute top-full z-50 origin-top-right rounded border bg-white py-0.5 shadow-md ltr:right-0 ltr:text-left rtl:left-0 rtl:text-right dark:border-gray-700 dark:bg-gray-800"
                  style="min-width:12rem;display: none;">
                  <li class="relative">
                      <div class="-mx-4 flex flex-row flex-wrap items-center px-3 py-4">
                          <div class="w-1/3 max-w-full flex-shrink px-4">
                              {{-- <img src="src/img/avatar/avatar.png" class="h-10 w-10 rounded-full" alt="Ari Budin"> --}}
                              <svg class="mr-2 h-10 w-10 text-gray-200 dark:text-gray-700" aria-hidden="true"
                                  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                      clip-rule="evenodd"></path>
                              </svg>
                          </div>
                          <div class="w-2/3 max-w-full flex-shrink px-4 ltr:pl-1 rtl:pr-1">
                              <div class="font-bold">
                                  <a href="#"
                                      class="text-gray-800 hover:text-indigo-500 dark:text-gray-300">{{ auth()->user()->name }}</a>
                              </div>
                              {{-- <div class="text-gray mt-1 text-sm">Professional Front end developer.</div> --}}
                          </div>
                      </div>
                  </li>
                  <li class="relative">
                      <hr class="my-0 border-t border-gray-200 dark:border-gray-700">
                  </li>
                  <li class="relative">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <a class="clear-both block w-full whitespace-nowrap py-2 px-6 hover:text-indigo-500"
                              href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            this.closest('form').submit();">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                  class="bi bi-box-arrow-in-right inline h-4 w-4 ltr:mr-2 rtl:ml-2"
                                  viewBox="0 0 16 16">
                                  <path fill-rule="evenodd"
                                      d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z">
                                  </path>
                                  <path fill-rule="evenodd"
                                      d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z">
                                  </path>
                              </svg>
                              Sign out
                          </a>
                      </form>
                  </li>
              </ul>
          </li>
      </ul>
  </nav>
  <!-- End Navbar -->
