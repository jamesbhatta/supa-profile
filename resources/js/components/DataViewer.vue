<template>
  <div class="data-card">
    <div class="data-card-body">
      <div class="d-flex mb-2">
        <h3 v-if="data.title" class="h3-responsive data-title">{{ data.title }}</h3>
        <div class="ml-auto switch-type-btn-group">
          <button type="button" v-on:click="setActive('table')" class="switch-data-type-btn" v-bind:class="{ active: activeDataType == 'table' }">Table</button>
          <button v-if="hasChartSlot" type="button" v-on:click="setActive('chart')" class="switch-data-type-btn" v-bind:class="{ active: activeDataType == 'chart' }">Chart</button>
          <button type="button" v-on:click="exportToExcel()" class="switch-data-type-btn">Export</button>
        </div>
      </div>
      <table v-if="activeDataType == 'table'" class="table table-responsive-sm table-striped" ref="exportable_table">
        <thead>
          <slot name="thead-top"></slot>
          <tr>
            <th v-for="(label, index) in data.labels" v-bind:key="index" class="font-weight-bold">{{ label }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, index) in data.data" v-bind:key="index">
            <template v-for="(item, index) in row">
              <td v-if="typeof item == 'object'" v-bind:key="index" :colspan="item.colspan" :rowspan="item.rowspan">{{ item.value }}</td>
              <td v-else v-bind:key="index">{{ item }}</td>
            </template>
          </tr>
          <slot name="tbody-bottom"></slot>
        </tbody>
      </table>

      <div v-show="activeDataType == 'chart'">
        <slot name="chart"></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["data"],
  data() {
    return {
      activeDataType: "table",
    };
  },

  computed: {
    hasChartSlot() {
      return !!this.$slots.chart;
    },
  },

  methods: {
    setActive(type = "table") {
      this.activeDataType = type;
    },

    exportToExcel() {
      var XLSX = require("xlsx");
      var elt = this.$refs.exportable_table;
      var wb = XLSX.utils.table_to_book(elt, { sheet: "Sheet JS" });
      let filename = this.data.title || 'profile-export';
      return XLSX.writeFile(wb, filename + ".xlsx");
      // return dl ? XLSX.write(wb, { bookType: type, bookSST: true, type: "base64" }) : XLSX.writeFile(wb, fn || "SheetJSTableExport." + (type || "xlsx"));
    },
  },
};
</script>

<style scoped>
.switch-type-btn-group {
  display: inline-flex;
}
.switch-type-btn-group button {
  margin-left: 0;
  margin-right: 0;
  background-color: #f2f2f2;
  color: #525b70;
  outline: none;
  border: 0px;
  padding: 5px 15px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-weight: 600;
  letter-spacing: 0.025rem;
}
.switch-type-btn-group button:first-of-type {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.switch-type-btn-group button:last-of-type {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.switch-type-btn-group button.active {
  background-color: #4285f4;
  color: #ffffff;
}
.export-btn {
  margin-left: 0;
  margin-right: 0;
  background-color: #f2f2f2;
  color: #525b70;
  outline: none;
  border: 0px;
  padding: 5px 15px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-weight: 600;
  letter-spacing: 0.025rem;
}
</style>