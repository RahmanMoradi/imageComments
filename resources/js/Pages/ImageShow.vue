<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Image from "@/Components/Image.vue";
import Comment from "@/Components/Comment.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ref} from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
const props = defineProps({
    user: Object,
    image: Object,
    comments: Object,
});

const form = useForm({
    user_id: props.user.id,
    image_id: props.image.id,
    body: '',
})

const showAddModal = ref(false);
const cn = () => {
    showAddModal.value = !showAddModal.value
}

const submit = () => {
    form.post(route('comments.store'));
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex items-center justify-center">
            <Image
                :id="image['id']"
                :url="image['image']"
                :title="image['title']"
                class="w-64 flex justify-center "
            />
        </div>
        <Modal :show="showAddModal" @close="cn">
            <div class="p-6">
                <form @submit.prevent="submit" class="">
                    <div class="">
                        <InputLabel for="user_id" value="User Id" />

                        <TextInput
                        id="user_id"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.user_id"
                        required
                        autofocus
                        autocomplete="user_id"
                        />

                        <InputError class="mt-2" :message="form.errors.user_id" />
                    </div>

                    <div class="">
                        <InputLabel for="image_id" value="Image Id" />

                        <TextInput
                            id="image_id"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.image_id"
                            required
                            autofocus
                            autocomplete="image_id"
                        />

                        <InputError class="mt-2" :message="form.errors.image_id" />
                    </div>

                    <div class="">
                        <InputLabel for="body" value="Comment Body" />

                        <TextInput
                            id="body"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.body"
                            required
                            autofocus
                            autocomplete="body"
                        />

                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create Comment
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </Modal>
        <PrimaryButton @click="cn">Add a New Comment</PrimaryButton>
        <div v-for="comment in comments">
            <Comment
                :writer="comment.user"
                :body="comment.body"
            />
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
