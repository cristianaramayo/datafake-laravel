<template>
    <page-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Search
            </h2>
        </template>
        <div class=" flex justify-center items-center">
            <div class="bg-white p-4 w-5/6 rounded-md">
              <div class="mt-10 mb-0 border-2 py-1 px-3 flex justify-between rounde-md rounded-md">
                <input v-model="q" type="text" class=" flex-grow border-0 outline-none text-gray-600 focus:text-gray-600  form-input rounded-md shadow-sm" placeholder="Search Dataset..." >
                <!--<input v-model="q" class="flex-grow border-0 outline-none text-gray-600 focus:text-gray-600 " type="text" placeholder="Search Dataset..." />
                -->
                <spa>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 hover:text-indigo-400 transition duration-100 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </spa>
              </div>
            </div>
        </div>

        <div v-for="dataset in datasets" class="bg-white shadow-lg rounded-lg px-4 py-6 text-justify">
           
            
          {{ dataset.num_download }}
        <h2 class="text-lg text-gray-600 truncate uppercase font-semibold">{{ dataset.title }}</h2>
        <h3 class="text-md text-gray-500">{{ dataset.about }}</h3>
           <hr class="my-6">
           <p>{{ dataset.created_at }} by {{ dataset.user_id }}</p>
        
        </div>

        
    </page-layout> 

</template>

<script>
    import PageLayout from '@/Layouts/PageLayout.vue'
    export default {
        components: {
            PageLayout
                
        },
        props: {
            datasets: Array,
            q: String
        },
        data() {
            return {
                q: ''
            }
        },
        watch: {
            q: function (value) {
                this.$inertia.replace(this.route('index', {q: value}))
            }
        }
    }
</script>