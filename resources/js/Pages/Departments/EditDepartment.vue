<template>
  <layout class="backg-color">

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Editar Departamento</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddUser">
          <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
          <div class="row">
            <div class="col-md-6">
              <label for="inputName">Nome</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputName"
                  class="form-control"
                  placeholder="Nome"
                  v-model="form.name"
                />
              </div>
              <div v-for="(erro, name) in errors" :key="name">
                <div v-if="name == 'name'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputInstituition">Instituição</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputInstituition"
                  class="form-control"
                  v-model="form.instituition"
                  name="txtinstituition"
                  @change='deleteInstituition($event)'
                >
                  <option id='selected_instituition' :value="form.instituition" style="background-color:gainsboro">{{ form.instituition }}</option>                  
                  <option
                    v-for="instituition in instituitions"
                    :key="instituition.id"
                    :value="instituition.id"
                  >
                    {{ instituition.social_name }}
                  </option>
                </select>
              </div>
            </div>        
          </div>
          <br />
                    
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success btnCadastrar">
                Editar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- <br> temporário -->

    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
  </layout>
</template>


<script>
import Layout from "../../Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    Layout,
    Link,
  },
  props: {
    errors: Object,
    department: Array
  },

  data: () => {
    return {
      form: {
        id: null,
        name: null,
        instituition: null,
        preserveState: true,
      },
    };
  },
  created() {
    
    this.form.id = this.$page.props.department[0].id,
    this.form.name = this.$page.props.department[0].name,
    this.form.instituition = this.$page.props.department[0].social_name

  },

  methods: {

    deleteInstituition: function() {
      $('#selected_instituition').remove();
    },

    sendForm() {
      this.$inertia.post("/departamento/atualizar/"+this.form.id,
        this.form,
        {
          forceFormData: true,
          preserveScroll: false,
          _token: this.$page.props.csrf_token,
          _method: "PUT",
          preserveState: true,
          onSuccess: () => {
            bootbox.alert({
              centerVertical: true,
              backdrop: true,
              closeButton: false,
              size: "large",
              title:
                "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
              message:
                "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
                "<span style='font-weight:bold; position: relative; top: 5px;'>Cadastro atualizado com sucesso!</span>",
            });
          },
        }
      );
    },
  },
};
</script>