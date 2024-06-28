<template>
  <div>
    <h1>Xampp</h1>
    <p>This is the Xampp page.</p>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="form.name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="form.email" required>
      </div>
      <div>
        <label for="message">Message:</label>
        <textarea id="message" v-model="form.message" required></textarea>
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
  <hr>
  <div>
    <h2>Comments</h2>
    <div v-if="comments.length">
        <div v-for="comment in comments" :key="comment.id">
          <p><strong>{{ comment.user.name }}</strong>:</p>
          <p>{{ comment.content }}</p>
        </div>
      </div>
      <p v-else>No comments yet.</p>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';

export default {
  name: 'Xampp',
  setup() {
    const form = ref({
      name: '',
      email: '',
      message: ''
    });

    const comments = ref([]);
    const subject_id = 1;

    const fetchComments = async () => {
      try {
        const response = await fetch(`/comments/${subject_id}`);
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        comments.value = await response.json();
        console.log(comments);
      } catch (error) {
        console.error('Error fetching comments:', error);
      }
    };

    const submitForm = async () => {
      try {
        const response = await fetch('/comments', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ ...form.value, user_id: 1, subject_id: 1 }), // Assuming user_id is 1 for now
        });
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        form.value.name = '';
        form.value.email = '';
        form.value.message = '';
        fetchComments(); // Refresh comments after submitting form
        alert('Comment submitted successfully!');
      } catch (error) {
        console.error('Error submitting comment:', error);
      }
    };

    onMounted(() => {
      fetchComments();
    });

    return {
        t:console.log(comments),
      form,
      comments,
      submitForm
    };
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
