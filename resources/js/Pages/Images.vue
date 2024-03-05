<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {ref} from "vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Image from "@/Components/Image.vue";

defineProps({
    images: Object,
    scopes: Object,
})

const showAddModal = ref(false);
const cn = () => {
    showAddModal.value = !showAddModal.value
}

const form = useForm({
    title: '',
    scope: '',
    image: null,
})

const submit = () => {
    form.post(route('images.store'));
};
</script>

<template>
    <Head title="Images" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Images</h2>
                <PrimaryButton @click="cn">Add</PrimaryButton>
                <Modal :show="showAddModal" @close="cn">
                    <div class="p-6">
                        <form @submit.prevent="submit" class="">
                            <div class="">
                                <InputLabel for="title" value="Image Title" />

                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                    autocomplete="title"
                                />

                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
<!--                            <div>{{scopes}}</div>-->
                            <div class="flex mt-2">
                                <InputLabel for="scope" value="scope2"></InputLabel>
                                <div v-for="scope in scopes" class="ml-3 flex">
                                    <InputLabel for="{{scope[0]}}">{{scope[1]}}</InputLabel>

                                    <Checkbox class="ml-3" :id="scope[0]" checked="true" value="{{scope[1]}}"></Checkbox>

                                    <InputError class="mt-2" :message="form.errors.scope" />
                                </div>
                            </div>

                            <div class="mt-2 flex items-center">
                                <InputLabel for="image" value="image" />

                                <TextInput
                                    id="image"
                                    type="file"
                                    class="ml-3 mt-1 block w-full"
                                    v-model="form.image"
                                    required
                                    autofocus
                                    autocomplete="image"
                                />

                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Create Image
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </Modal>

            </div>
        </template>
        <!--                Images          -->
        <div v-for="image in images" class="mt-2 ml-3">
            <Image :id="image['id']" :url="image['image']" :title="image['title']"/>
        </div>
    </AuthenticatedLayout>
</template>
