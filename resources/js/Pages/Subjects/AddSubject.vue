<template>
  <div v-if="isAuthorized">
    <h1>Add New Subject</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label for="title">Title:</label>
        <input type="text" id="label" v-model="form.label" required>
      </div>
      <div>
        <label for="description">Description:</label>
        <textarea id="description" v-model="form.description" required></textarea>
      </div>
      <button type="submit">Add Subject</button>
    </form>
  </div>
  <div v-else>
    <p>You are not authorized to add subjects.</p>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

export default {
  name: 'AddSubject',
  setup() {
    const form = useForm({
      label: '',
      description: ''
    });

    const isAuthorized = ref(false);
    const { props } = usePage();

    onMounted(() => {
      const user = props.auth.user;
      if (user && user.name === 'houss') {
        isAuthorized.value = true;
      }
    });

    const submitForm = async () => {
      try {
        await form.post('/subjects', form.value);
        form.reset();
        alert('Subject added successfully!');
      } catch (error) {
        console.error('Error adding subject:', error);
      }
    };

    return {
      form,
      isAuthorized,
      submitForm
    };
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
