<template>
  <div class="data-card">
    <div class="data-card-body">
      <h3 v-if="data.title" class="h3-responsive data-title">{{ data.title }}</h3>
      <table class="table table-responsive-sm table-striped">
        <thead>
          <slot name="thead-top"></slot>
          <tr>
            <th v-for="(label, index) in data.labels" v-bind:key="index" class="font-weight-bold">{{ label }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, index) in data.data" v-bind:key="index">
            <template v-for="(item, index) in row">
              <td v-if="typeof item == 'object'" v-bind:key="index" :colspan="item.colspan"  :rowspan="item.rowspan">{{ item.value }}</td>
              <td v-else v-bind:key="index">{{ item }}</td>
            </template>
          </tr>
          <slot name="tbody-bottom"></slot>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  props: ["data"],
};
</script>

<style scoped>

</style>