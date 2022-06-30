<template>
  <select :value="value" @change="updateSelect">
    <option disabled selected="selected"></option>
    <option v-for="(option, idx) in options" :value="option" :key="idx">{{option}}</option>
  </select>
</template>

<script>
export default {
  props: ['value', 'options'],
  methods: {
    updateSelect: function(event) {
      this.$emit('input', event.target.value);
    }
  }
}
</script>

<style>

</style>