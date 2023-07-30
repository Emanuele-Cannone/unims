<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    defaultPermissions: Array,
});

const fileInput = ref(null);

const form = useForm({
    excelFile: null
});


const getExcelFile = () => {
    form.excelFile = fileInput.value.files[0];

    form.post(route('sendFile'), {
        preserveScroll: true,
        onSuccess: () => {
            console.log('invio effettuato');
        },
    });
};




</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <form @submit.prevent="getExcelFile" enctype="multipart/form-data">

            <input ref="fileInput" type="file">

            <button type="submit">invia</button>
        </form>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
