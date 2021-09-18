<template>
    <Head title="Datatuill" />

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
           
         <div>           
             
        <hero-section>
        
        </hero-section>
        </div>
    </div>
        <div> 
        <div>            
                
         

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
               <!-- <div class="justify-center  bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"> -->
                    
                <!--</div>-->
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div v-if="canLogin" class="bottom-0 left-0 px-6 py-2 sm:block">
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
                    <div v-if="canLogin" class="left-0 px-6 py-2 sm:block">
                        <Link :href="route('register')" class="text-sm text-gray-700 underline">
                            Terminos
                        </Link>
                        <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                            Privacidad
                        </Link>
                        <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                            Tutorial
                        </Link>
                    </div>
                </div>

                <div class=" align-text-bottom mb-0 px-6 text-sm text-gray-500 text-right ">
                    © 2021 All Rights Reserved, Datatuill
                </div>
            </div>
        </div>
    
    </div>
</template>



<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import HeroSection from '../components/HeroSection.vue';

    export default defineComponent({
        components: {
            Head,
            Link,
            HeroSection,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
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