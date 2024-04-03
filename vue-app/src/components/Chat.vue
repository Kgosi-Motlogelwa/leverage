<template>
  <div style="position: relative;">
    <!-- Button to toggle pop-up -->
    <button @click="togglePopUp" style="position: fixed; bottom: 20px; right: 20px; z-index: 999; background-color: black; color: white; border-radius: 15px">{{ showPopUp ? 'Close Chat' : 'Open Chat' }}</button>

    <!-- Pop-up -->
    <div v-if="showPopUp" class="popup" style="position: fixed; bottom: 20px; right: 150px; background-color: white; padding: 20px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); max-width: 50%;">
      <!-- Your existing content here -->
      <div style="height: 400px; overflow-y: scroll; margin-bottom: 10px; display: flex; flex-direction: column;">
        <div v-for="(message, index) in conversation" :key="index" style="padding: 20px; margin: 20px; width: fit-content; max-width: 70%; border-radius: 40px;" :style="{ backgroundColor: message.role === 'user' ? '#7CB644' : '#f0f0f0', textAlign: 'left', color: 'black', alignSelf: message.role === 'user' ? 'flex-start' : 'flex-end' }">
          {{ message.content }}
          <br>
          <!-- Display uploaded image -->
          <img v-if="message.image" :src="message.image" alt="Uploaded Image" style="width: 100px; height: auto; margin-top: 10px;">
        </div>
      </div>
      
      <!-- Display spinner when loading -->
      <div v-if="loading" style="display: flex; justify-content: center; margin-bottom: 10px;">
        <img src="../assets/Spinner3.gif" alt="Spinner" style="width: 32px; height: 32px;">
      </div>

      <div style="display: flex; align-items: center; margin-bottom: 10px;">
        <label for="fileInput" style="cursor: pointer; display: inline-block;">
          <input id="fileInput" type="file" accept="image/*" @change="handleImageUpload" style="display: none;">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload">
            <path d="M16 3v6h5m-3.293 9.293a1 1 0 0 1-1.414 0L11 10.414V15a1 1 0 0 1-2 0V10.414L5.707 12.707a1 1 0 0 1-1.414-1.414l5-5a1 1 0 0 1 1.414 0l5 5a1 1 0 0 1 0 1.414z"></path>
            <path d="M12 19v3"></path>
          </svg>
        </label>
        <input type="text" v-model="inputMessage" style="flex: 1; margin-right: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 15px; font-size: 16px; line-height: 1.5;">
        <button @click="handleSendMessage" style="padding: 10px 20px; background-color: black; border: none; border-radius: 15px; color: white; font-size: 16px; line-height: 1.5; cursor: pointer;">Send</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      inputMessage: '',
      inputImage: '',
      model: 'llava',
      conversation: [],
      loading: false,
      showPopUp: false // Add showPopUp data property
    };
  },
  methods: {
    async handleSendMessage() {
      this.loading = true;
      // Set loading state to true before API call
      const currentUserMessage = { role: 'user', content: this.inputMessage, image: this.inputImage }; // Include uploaded image in message object
      const previousMessage = this.conversation.length > 0 ? this.conversation[this.conversation.length - 1] : null;

      const messagesToSend = [];
      if (previousMessage) {
        messagesToSend.push(previousMessage);
      }
      messagesToSend.push(currentUserMessage);

      this.conversation.push(currentUserMessage);

      const requestBody = {
        model: this.model,
        stream: false,
        messages: messagesToSend,
      };

      try {
        console.log("RequestBody: ", requestBody)
        const response = await axios.post(
          'https://148ftvxv-11434.uks1.devtunnels.ms/api/chat',
          requestBody
        );
        const botMessage = response.data.message;
        console.log("response: ", response)
        this.conversation.push(botMessage);
      } catch (error) {
        console.error('Error:', error);
      }

      this.inputMessage = '';
      this.loading = false; // Set loading state to false after API call
      this.inputImage = ''; // Clear uploaded image after sending message
    },
    handleImageUpload(e) {
      const file = e.target.files && e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onloadend = () => {
          if (typeof reader.result === 'string') {
            this.inputImage = reader.result;
          }
        };
        reader.readAsDataURL(file);
      }
    },
    togglePopUp() {
      this.showPopUp = !this.showPopUp;
    }
  }
};
</script>

<style>
.popup {
  z-index: 999;
}
</style>