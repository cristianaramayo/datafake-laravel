<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Datatuill
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> 

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Create Dataset</h3>
                            <p class="text-sm text-gray-600">Instrucciones blabla bla...</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            
                            
                            <form @submit.prevent="submit">
                                
                                <label class="block font-medium text-sm text-gray-700">
                                    Code
                                </label>
                                <div  >
                                <textarea 
                                    name="body"
                                    class="form-input w-full rounded-md shadow-sm"
                                    id="body"
                                    @input="$emit('input', $event.target.value); resize($event)"
                                   v-model="form.code"
                                ></textarea>
                                </div>
                                <button 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                                >Send</button>
                            </form>
                            
                        </div>
                    </div>
                </div>  
            </div>
        </div>


                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    
    import AppLayout from '@/Layouts/AppLayout.vue'
   

    export default {
        data () {
            return {
                
                form: {
                    code: 'abc',
                    
                }
            }
        },
        components: {
            AppLayout,
            
            
        },
        
        
        
        methods: {
            resize (e) {
                e.target.style.heigth = 'auto'
                e.target.style.heigth = `${e.target.scrollHeight}px`
            },
            submit() {
                this.$inertia.post(this.route('store'), this.form)
            }
        }
    }
</script>
