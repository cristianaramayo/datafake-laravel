<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo Datas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Dataset about:</h3>
                            <p class="text-sm text-gray-600"> {{  }} </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <div class="bg-gray-300 justify-between px-4 py-4 "  >
                                <p class="text-lg text-gray-600">[NUM] de registros con el siguiente formato:</p>
                                <p>----- ------ - ------------ -- --- -------- -- --------</p>
                                <ul> 
                                <li v-for="(value,key,index) in first = datas.shift()" class="text-sm text-gray-500 px-2 py-1 m-2">
                                    <p>{{ key }} : {{ value }}</p></li>
                                </ul>    
                                <p>----- ------ - ------------ -- --- -------- -- --------</p>
                                <p class="text-lg text-gray-500">Vista previa de los primeros 10 resultados...</p>
                                
                            </div>
                            <div class="flex text-sm text-gray-600 bg-gray-300 justify-between "  >
                              
                                <table class="justify-between px-4 py-4">
                                <tr class=" px-2 py-4 m-2">
                                     <td class="bg-gray-200 px-4 py-2 m-2">
                                        
                                    </td>
                                    <td v-for="(value,key) in first" class="bg-gray-200 px-4 py-2 m-2">
                                        <div class="flex justify-end" >
                                          {{ key }} 
                                        </div>
                                    </td>
                                </tr>
                                <tr class=" px-2 py-4 m-2">
                                    <td class=" px-4 py-2 m-2">
                                        00
                                    </td>
                                    <td v-for="(value,key) in first" class=" px-4 py-2 m-2">
                                        <div class="flex justify-end" >
                                          {{ value }} 
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr v-for="i in 9" class=" px-2 py-4 m-2">
                                    <td class=" px-4 py-2 m-2">
                                         0{{i}}                                    </td>
                                    <td v-for="(value,key) in datas.shift()" class=" px-4 py-2 m-2">
                                        <div class="flex justify-end" >
                                          {{ value }}
                                        </div>
                                    </td>
                                    
                                </tr>
                                
                                </table>
                             </div>
                           <!--  <div class="flex" >   
                                <div v-for="data in datas"  class="bg-gray-300 px-4 py-2 m-2">
                                    <div v-for="(value,key) in data"  class="bg-gray-100 px-2 py-2 ">
                                
                                        {{ key }}: {{ value }}
                                    </div>
                                </div>
                                
                                
                            </div>
                            -->
                            <hr class="my-6">

                            <inertia-link :href="route('dashboard')">
                                Volver
                            </inertia-link>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    export default {
        components: {
            AppLayout,
        },
        props: {
            datas: Array,
        },
        data () {
           

            return {
               
               
            }
        },

    }
</script>