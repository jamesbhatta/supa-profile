<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="h5-responsive">{{ resource.display_name }}</h5>
        <table class="table">
          <thead>
            <tr>
              <td v-for="(field, index) in resource.fields" :key="index">{{ field.label }}</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td v-for="(field, index) in resource.fields" :key="index">
                <input type="text" class="form-control" :value="field.name" />
              </td>
              <td class="text-right">
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm z-depth-0">Edit</button>
                  <button class="btn btn-danger btn-sm z-depth-0">Delete</button>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="42">
                <button>Add</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- <div  class="card z-depth-0 border mb-3 mb-md-4">
      <div class="card-header">
        <div>{{ index + 1 }}</div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="" class="form-label">Label</label>
          <input type="text" v-model="field.label" class="form-control" />
        </div>
        <div class="form-group">
          <label for="" class="form-label">Name</label>
          <input type="text" v-model="field.name" class="form-control" />
        </div>
        <div class="form-group">
          <label for="" class="form-label">Type</label>
          <select v-model="field.type" id="" class="custom-select">
            <option value="short_answer">Short Answer</option>
            <option value="paragraph">Paragraph</option>
            <option value="date">Date</option>
            <option value="time">Time</option>
          </select>
        </div>

        <div class="d-flex align-items-center space-x-5 justify-content-end pt-3 pb-2">
          <label class="inline-flex items-center">
            <input v-model="field.is_required" type="checkbox" value="1" />
            <span class="ml-2">Required</span>
          </label>
          <div class="ml-3">
            <button class="btn btn-sm btn-danger d-flex align-items-center z-depth-0" @click="removeField(index)">
              <svg class="w-4 h-4" style="height: 1rem" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="ml-2">Remove</span>
            </button>
          </div>
        </div>
      </div>
    </div> -->

  </div>
</template>

<script>
import Form from "form-backend-validation";
export default {
  props: {
    resource: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      form: new Form({
        fields: [
          {
            label: null,
            name: null,
            type: "text",
            is_required: false,
          },
        ],
      }),
    };
  },

  created() {
    console.log(this.resource.fields);
    this.form.fields = this.resource.fields.map((field) => {
      return {
        label: field.label,
        name: field.name,
        type: field.type,
        is_required: field.is_required,
      };
    });
  },

  methods: {
    addField() {
      // this.form.fields.push({
      //   label: null,
      //   answer_type: "short_answer",
      //   is_required: false,
      // });
      let newFields =  this.resource.fields.map((field) => {
      return {
        label: field.label,
        name: field.name,
        type: field.type,
        is_required: field.is_required,
      };
    });
    },

    removeField(index) {
      this.form.fields.splice(index, 1);
    },

    submit() {
      this.form
        .post(`/resources/${this.resource.slug}/fields`)
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>