<template>
    <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" :href="href">
      <span v-html="icon"></span>
    </a>
  </template>
  
  <script>
  export default {
    name: 'SidebarLink',
    props: {
      href: {
        type: String,
        required: true,
      },
      icon: {
        type: String,
        required: true,
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add any scoped styles here */
  </style>
  