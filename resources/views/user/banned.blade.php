<x-guest-layout>
<!-- ====== Error 404 Section Start -->
<section class="bg-indigo-300 relative py-[120px] h-[100vh]">
    <div class="mycontainer">
      <div class="mx-4 flex">
        <div class="w-full px-4">
          <div class="mx-auto max-w-3/4 text-center">
            <h2
              class="mb-2 text-[50px] font-bold leading-none text-white sm:text-[80px] md:text-[100px]"
            >
              Access Denied
            </h2>
            <h4 class="mb-3 text-[22px] font-semibold leading-tight text-white">
              You've been restricted from using our services.
            </h4>
            <p class="mb-8 text-lg text-white">
              Our moderators noticed your activities on our website were not in compliance with our policies.
            </p>
            <p class="mb-8 text-lg text-white">
                Do you disagree with our decision to terminate our services to you?
                <br> Contact our support <a href="mailto:admin@bluestechltd.com">admin@bluestechltd.com</a>
              </p>
            <div class="flex flex-nowrap justify-center gap-4">
                <a
              href="/"
              class="hover:text-indigo-300 inline-block rounded-lg border border-white px-8 py-3 text-center text-base font-semibold text-white transition hover:bg-white"
            >
              Go To Home
            </a>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a
                href="{{route('logout')}}" @click.prevent="$root.submit();"
                class="hover:text-indigo-300 inline-block bg-white text-indigo-300 rounded-lg border border-white px-8 py-3 text-center text-base font-semibold transition hover:bg-slate-200"
              >
                Logout
              </a>
            </div>
            </form>           
          </div>
        </div>
      </div>
    </div>
    <div
      class="absolute top-0 left-0 -z-10 flex h-full w-full items-center justify-between space-x-5 md:space-x-8 lg:space-x-14"
    >
      <div
        class="h-full w-1/3 bg-gradient-to-t from-[#FFFFFF14] to-[#C4C4C400]"
      ></div>
      <div class="flex h-full w-1/3">
        <div
          class="h-full w-1/2 bg-gradient-to-b from-[#FFFFFF14] to-[#C4C4C400]"
        ></div>
        <div
          class="h-full w-1/2 bg-gradient-to-t from-[#FFFFFF14] to-[#C4C4C400]"
        ></div>
      </div>
      <div
        class="h-full w-1/3 bg-gradient-to-b from-[#FFFFFF14] to-[#C4C4C400]"
      ></div>
    </div>
  </section>
  <!-- ====== Error 404 Section End -->
</x-guest-layout>