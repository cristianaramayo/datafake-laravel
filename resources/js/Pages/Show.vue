<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Datatuill
            </h2>
        </template>
    

    
    <div class=" px-6 py-4 justify-center  bg-gray-100 dark:bg-gray-900 ">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
                <div class=" md:gap-6">
                    
                    <div class="justify-center mt-5 md:mt-0">
                        <div class=" justify-center shadow bg-white md:rounded-md p-4">
                            <div> {{ code = datas.shift() }} </div>
                            <div> {{ datasets = datas.shift() }} </div>
                            <div class="flex flex-auto text-sm text-gray-600 p-4"  >
                                
                                <table class="justify-center px-4 py-4 bg-gray-300 ">
                                <tr class=" px-2 py-4 m-2">
                                     <td class="border bg-gray-100 px-4 py-2 m-2">
                                        
                                    </td>
                                    <td v-for="(value,key)  in first = datasets.shift()" class=" border bg-gray-100 px-4 py-2 m-2">
                                        <div class="flex justify-end" >
                                           {{ key }}
                                        </div>
                                    </td>
                                </tr>
                                <tr class=" px-2 py-4 m-2">
                                    <td class=" border px-4 py-2 m-2">
                                        00
                                    </td>
                                    <td v-for="(value,key) in first" class="border px-4 py-2 m-2">
                                        <div class="flex justify-end" >
                                          {{ value }} 
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr v-for="i in 9" class=" border px-2 py-4 m-2">
                                    <td class=" px-4 py-2 m-2">
                                         0{{i}}                                    </td>
                                    <td v-for="(value,key) in datasets.shift()" class="border px-4 py-2 m-2">
                                        <div class="flex justify-end" >
                                          {{ value }}
                                        </div>
                                    </td>
                                    
                                </tr>
                                
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class=" mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                
                                <label class="block font-medium text-sm text-gray-700">
                                    Description
                                </label>
                                <textarea 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.description"
                                    rows="5"
                                ></textarea>
                                <button 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                                >Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>            
                
            

            
        </div>
    </div>
    
    </app-layout>
</template>


<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    

    export default defineComponent({
        components: {
           AppLayout,
           
        },

        props: {
           
            datas: Array,
        },
        data () {
            return {
               
                form: {
                    description: 'Holis',
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post(this.route('create'), this.form)
            }
        }
    })
</script>
