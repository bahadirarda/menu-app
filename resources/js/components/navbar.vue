<template>
    <nav class="bg-gray-800 text-white shadow-lg">
      <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <!-- Navigation Bar İçeriği -->
          <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex-shrink-0 flex items-center">
              <img class="block lg:hidden h-8 w-auto" src="#" alt="Your Logo">
              <img class="hidden lg:block h-8 w-auto" src="#" alt="Your Logo">
            </div>
            <div class="hidden sm:block sm:ml-6">
              <div class="flex space-x-4">
                <!-- Navigation Links -->
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium">Home</a>
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium">About</a>
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium">Services</a>
                <a href="#" class="px-3 py-2 rounded-md text-sm font-medium">Contact</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'navbar'
  }
  </script>
  
  <style>
  /* Stil tanımlamalarınız burada yer alabilir. */
  </style>
  