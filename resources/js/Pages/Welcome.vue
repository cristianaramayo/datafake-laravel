<template>
    <Head title="Datatuill" />

    

  <div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100" />
        </svg>

        <Popover>
          <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
              <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                <div class="flex md:items-center md:justify-between sm:justify-between w-full md:w-auto sm:w-auto">
                  
                  <a href="#">
                    <!--<span class="sr-only">Workflow</span>-->
                    <img class="hidden md:block  md:h-8 md:w-8 lg:h-8 lg:w-8 " src="/images/logo-datatuill.png"  />
                  </a>
                  <div class="-mr-2 flex items-center md:hidden">
                    <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                      <span class="sr-only">Open main menu</span>
                      <MenuIcon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                  </div>
                </div>
              </div>
              <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                <a v-for="item in navigation" :key="item.name" :href="item.href" class="font-medium text-gray-500 hover:text-gray-900">{{ item.name }}</a>
              
                  <Link v-if="$page.props.user" :href="route('dashboard')" class="font-medium text-gray-500 hover:text-indigo-600">
                  Dashboard
                  </Link>
                  <template v-else>
                  <Link :href="route('login')" class="font-medium text-gray-500 hover:text-indigo-600">
                    Log in
                  </Link>

                  <Link v-if="canRegister" :href="route('register')" class="font-medium text-gray-500 hover:text-indigo-600">
                    Register
                  </Link>
                  </template>
                <!--<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Log inno</a>
                -->
                
              </div>
            </nav>
          </div>

          <transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
              <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="px-5 pt-4 flex items-center justify-between">
                 <!-- <div class="h-24 w-24 md:h-24 md:w-24  sm:h-24 sm:w-24">
                    <img   src="/images/logo-datatuill.png" alt="" />
                  </div>-->
                  <div class="-mr-2">
                    <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                      <span class="sr-only">Close main menu</span>
                      <XIcon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                  </div>
                </div>
                <div class="px-2 pt-2 pb-3 space-y-1">
                  <a v-for="item in navigation" :key="item.name" :href="item.href" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
                </div>
                <div class="px-2 pt-2 pb-3 space-y-1">
                  <Link v-if="$page.props.user" :href="route('dashboard')" class="font-medium text-gray-500 hover:text-indigo-600">
                  Dashboard
                  </Link>
                
                  <template v-else>
                  <Link :href="route('login')" class="font-medium text-gray-500 hover:text-indigo-600">
                    Log in
                  </Link>
                
                  <Link v-if="canRegister" :href="route('register')" class="font-medium text-gray-500 hover:text-indigo-600">
                    Register
                  </Link>
                  </template>
                </div>
              </div>
            </PopoverPanel>
          </transition>
        </Popover>

        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
          <div class=" sm:text-center  md:text-center lg:text-left">
           
              
              <img class="  md:hidden px-28  w-auto " src="/images/logo-data.png"  />
              
            
            <h1 class="text-5xl tracking-tight font-extrabold text-gray-900 sm:text-6xl md:text-7xl">
              <span class="block xl:inline">Datatuill</span>
            </h1><h2 class="text-3xl tracking-tight font-extrabold  sm:text-4xl md:text-5xl">  
              <span class="block text-indigo-600 xl:inline">The World's First Dummy Data Platform</span>
            </h2>
            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
              Dataset with dummy data from over 70 industry examples
            </p>

  
            <div class=" flex justify-center items-center">
            <div class="bg-white p-4 w-5/6 rounded-md">
              <div class="mt-10 mb-0 border-2 py-1 px-3 flex justify-between rounde-md rounded-md">
                <input class="flex-grow border-0 outline-none text-gray-600 focus:text-gray-600 " type="text" placeholder="Search Dataset..." />
                <spa>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 hover:text-indigo-400 transition duration-100 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </spa>
              </div>
            </div>
            </div>

            <div class=" flex flex-wrap justify-center mt-1 sm:mt-3  ">
              <div class=" w-40  sm:mt-3 my-1 mx-1">
                <a href="#" class="w-full flex items-center justify-center px-8 py-3 md:py-4 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 ">
                  Social Media
                </a>
              </div> 
              <div class="w-40 sm:mt-3 my-1 mx-1">
                <a href="#" class="w-full flex items-center justify-center px-8 py-3 md:py-4 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 ">
                  E-Commerce
                </a>
              </div> 
              <div class="w-40 sm:mt-3 my-1 mx-1">
                <a href="#" class="w-full flex items-center justify-center px-8 py-3 md:py-4 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 ">
                  Gaming
                </a>
              </div> 
              <div class="w-40 sm:mt-3 my-1 mx-1">
                <a href="#" class="w-full flex items-center justify-center px-8 py-3 md:py-4 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 ">
                  Argentina
                </a>
              </div>              
              <div class="w-40 sm:mt-3  my-1 mx-1">
                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4">
                  Live demo
                </a>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
      <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="" />
    </div>
  </div>
  <div class="flex justify-center mx-4 mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>

                        <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                            Shop
                        </a>

                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>

                        <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                     © 2021 All Rights Reserved, Datatuill
                </div>
  </div>
  
</template>

<script>

  import { defineComponent } from 'vue'
  import { Head, Link } from '@inertiajs/inertia-vue3';
  import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
  import { MenuIcon, XIcon } from '@heroicons/vue/outline'

  const navigation = [
    { name: 'About', href: '#' },
    { name: 'Features', href: '#' },
  ]

export default defineComponent({
        components: {
            Head,
            Link,
            Popover,
            PopoverButton,
            PopoverPanel,
            MenuIcon,
            XIcon,
        },
        setup() {
          return {
            navigation,
        }
      },
      props: {
            canLogin: Boolean,
            canRegister: Boolean,
        },
        data () {
            return {
               
            }
        },
        methods: {
            submit() {
               // this.$inertia.post(this.route('store'), this.form)
            }
        }
    })
</script>