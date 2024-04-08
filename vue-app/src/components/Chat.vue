<template>
  <div style="position: relative;">
    <!-- Button to toggle pop-up -->
    <button @click="togglePopUp" style="position: fixed; bottom: 20px; right: 20px; z-index: 999; background-color: black; color: white; border-radius: 15px">{{ showPopUp ? 'Close Chat' : 'Open Chat' }}</button>

    <!-- Pop-up -->
    <div v-if="showPopUp" class="popup" style="position: fixed; bottom: 70px; right: 20px; background-color: white; padding: 20px; border-radius: 15px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); max-width: 75%;">
      <!-- Your existing content here -->
      <div ref="conversationContainer" style="height: 300px; overflow-y: scroll; margin-bottom: 10px; display: flex; flex-direction: column;">
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

      <div class="message-input-container">
          <div class="input-wrapper">
              <label for="fileInput" class="file-input-label">
                  <input id="fileInput" type="file" accept="image/*" @change="handleImageUpload" style="display: none;">
                  <img v-if="inputImage" :src="inputImage" alt="Uploaded Image" style="width: 24px; height: 24px;">
                  <img v-else src="../assets/add_image.png" alt="Add Image" style="width: 24px; height: 24px;">
              </label>
              <input type="text" v-model="inputMessage" class="message-input" @keydown.enter="sendMessageOnEnter">
          </div>
          <button @click="handleSendMessage" class="send-button">Send</button>
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
      this.inputMessage = '';
      const messagesToSend = [];
      if (previousMessage) {
        messagesToSend.push(previousMessage);
      }
      messagesToSend.push(currentUserMessage);

      this.conversation.push(currentUserMessage);

      const requestBody = {
        model: this.model,
        stream: false,
        messages: this.conversation,
      };
      this.$nextTick(() => {
            this.$refs.conversationContainer.scrollTop = this.$refs.conversationContainer.scrollHeight;
        });

      try {
        console.log("RequestBody: ", requestBody)
        const response = await axios.post(
          'https://148ftvxv-11434.uks1.devtunnels.ms/api/chat',
          requestBody
        );
        const botMessage = response.data.message;
        console.log("response: ", response)
        this.conversation.push(botMessage);
        this.$nextTick(() => {
            this.$refs.conversationContainer.scrollTop = this.$refs.conversationContainer.scrollHeight;
        });
      } catch (error) {
        console.error('Error:', error);
      }

      
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
    },
    sendMessageOnEnter(event) {
        if (event.key === 'Enter' && this.inputMessage.trim() !== '') {
            this.handleSendMessage();
        }
    }
  }

  
};


</script>

<style>
.popup {
  z-index: 999;
}
.message-input-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.input-wrapper {
    white-space: nowrap;
    display: flex;
    align-items: center;
    flex-grow: 1; /* Take up remaining space */
}

.file-input-label {
    cursor: pointer;
}

.message-input {
    flex-grow: 1; 
    /* margin-right: 10px; */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
    font-size: 16px;
    line-height: 1.5;
    margin-left: 10px;
}

.send-button {
    padding: 10px 20px;
    background-color: black;
    border: none;
    border-radius: 15px;
    color: white;
    font-size: 16px;
    line-height: 1.5;
    cursor: pointer;
}

@media (min-width: 500px) {
    .message-input {
        margin-right: 10px;
    }
    .send-button {
        max-width: 150px;
    }
}
@media (max-width: 500px) {
    .send-button {
        width: 100%;
        margin-top: 10px;
    }
}

</style>