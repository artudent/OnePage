<template>
  <input type="text" :value="value" @input="updateTextInput">
</template>

<script>
export default {
  props: ['value'],
  methods: {
    updateTextInput: function(event) {
      this.$emit('input', event.target.value);
    }
  }
}
</script>

<style>

</style>