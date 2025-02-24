<div class="flex flex-col" x-data="{
    isDark: localStorage.getItem('theme') === 'dark' || window.matchMedia('(prefers-color-scheme: dark)').matches,
    init() {
      // Create a MutationObserver to watch for class changes on the documentElement
      const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
          if (mutation.attributeName === 'class') {
            this.isDark = document.documentElement.classList.contains('dark');
          }
        });
      });
      observer.observe(document.documentElement, { attributes: true });
    }
  }">
    <h2 class="flex items-center flex-wrap sora text-xl capitalize text-indigo-600 dark:text-blue-500 tracking-wide">    
        <img x-bind:src="isDark ? '{{ asset('images/blues_dark.png') }}' : '{{ asset('images/blues.png') }}'" src="{{ asset('images/blues.png') }}" alt="App logo" class="w-10 h-10 mr-1">    
        <span>Blues</span>
        <span>efficiency</span>   
    </h2>   
</div>
