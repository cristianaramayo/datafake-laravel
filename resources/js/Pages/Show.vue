<template>
    

    <div class="justify-center  bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>
            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div>
    </div>
    <div class=" px-6 py-4 justify-center  bg-gray-100 dark:bg-gray-900 ">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    
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
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                
                                <label class="block font-medium text-sm text-gray-700">
                                    Description
                                </label>
                                <textarea 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.description"
                                    rows="8"
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
                
            

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div v-if="canLogin" class="flex items-center">
                        <Link :href="route('login')" class="text-sm text-gray-700 underline">
                            Log in
                        </Link>
                        <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                            Register
                        </Link>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    © 2021 All Rights Reserved, Datatuill
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
           
            Link,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            datas: Array,
        },
        data () {
            return {
                form: {
                    description: '',
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
