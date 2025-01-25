      <!-- ====== Footer Section Start -->
      <footer class="relative bg-slate-700 px-6 pt-20 pb-20 lg:pb-32">
          <div class="max-w-6xl mx-auto">
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                  <div class="">
                      <a href="javascript:void(0)" class="flex items-center gap-2">
                        <span class="bg-slate-800 rounded-lg text-lg archivo-700 text-indigo-500 px-3 py-1.5">B</span>
                        <span class="text-white text-xl archivo-700 uppercase">Bluesefficency</span>
                      </a>
                      <p class="text-gray-200 text-sm mt-4">
                          We manage assets and help our members accrue profit from our daily ativities in the
                          markets with insurance. We have been recommended by some of the biggest Fund Managers.
                      </p>
                  </div>
                  <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                      <div class="flex flex-col gap-2">
                          <h4 class="text-indigo-500 text-md archivo-700 uppercase tracking-wide">Company</h4>
                          <ul class="list-none space-y-0.5" role="list">
                              <li role="listitem">
                                  <a href="{{ route('about') }}" class="text-gray-200 hover:text-gray-50 text-sm">
                                      About us
                                  </a>
                              </li>
                              <li role="listitem">
                                  <a href="{{ route('contact') }}" class="text-gray-200 hover:text-gray-50 text-sm">
                                      Contact & Support
                                  </a>
                              </li>
                              <li role="listitem">
                                  <a href="{{ route('team') }}" class="text-gray-200 hover:text-gray-50 text-sm">
                                      Team members
                                  </a>
                              </li>
                              <li role="listitem">
                                  <a href="{{ route('faqs') }}" class="text-gray-200 hover:text-gray-50 text-sm">
                                      FAQs
                                  </a>
                              </li>
                          </ul>
                      </div>
                      <div class="flex flex-col gap-2">
                          <h4 class="text-indigo-500 text-md archivo-700 uppercase tracking-wide">Quick Links</h4>
                          <ul class="list-none space-y-0.5" role="list">
                              <li role="listitem">
                                  <a href="{{ route('guestHome') }}" class="text-gray-200 hover:text-gray-50 text-sm">
                                      Home page
                                  </a>
                              </li>
                              <li role="listitem">
                                  <a href="{{ route('pricing') }}" class="text-gray-200 hover:text-gray-50 text-sm">
                                      Pricing
                                  </a>
                              </li>
                              <li role="listitem">
                                  <a href="{{ route('articles') }}" class="text-gray-200 hover:text-gray-50 text-sm">
                                      Insights
                                  </a>
                              </li>
                              <li role="listitem">
                                  <a href="{{ route('testimonials') }}"
                                      class="text-gray-200 hover:text-gray-50 text-sm">
                                      Client reviews
                                  </a>
                              </li>
                          </ul>
                      </div>
                      <div class="flex flex-col gap-2">
                          <h4 class="text-indigo-500 text-md archivo-700 uppercase tracking-wide">Contact Us</h4>
                          <ul class="list-none space-y-0.5" role="list">
                              <li role="listitem" class="flex">
                                  <a href="tel:{{ $company->tel }}" class="flex items-center gap-2 hover:text-gray-50">
                                      <svg class="w-5 h-5 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                          viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                          stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                                          stroke-width="2">
                                          <path
                                              d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                          </path>
                                      </svg>
                                      <span class="text-gray-200 text-sm">{{ $company->tel }}</span>
                                  </a>
                              </li>
                              <li role="listitem" class="flex">
                                  <a href="mailto:{{ $company->email }}"
                                      class="flex items-center gap-2 hover:text-gray-50">
                                      <svg class="w-5 h-5 text-gray-200" xmlns="http://www.w3.org/2000/svg"
                                          viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                          stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                                          stroke-width="2">
                                          <path
                                              d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                          </path>
                                          <path d="M3 7l9 6l9 -6"></path>
                                      </svg>
                                      <span class="text-gray-200 text-sm">{{ $company->email }}</span>
                                  </a>
                              </li>
                          </ul>
                          <p class="text-gray-200 text-sm">&copy; {{ now()->format('Y') }} {{ config('app.name') }}.
                              All rights reserved</p>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
      <!-- ====== Footer Section End -->
