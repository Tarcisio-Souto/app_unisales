<template>
  <layout class="backg-color">

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Editar Setor</h4>
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
            <div class="col-md-4">
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
            <div class="col-md-4">
              <label for="inputName">Nº Patrimônio</label>
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
                  v-model="form.patrimonio"
                />
              </div>
              <div v-for="(erro, patrimonio) in errors" :key="patrimonio">
                <div v-if="patrimonio == 'patrimonio'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputModel">Modelo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputModel"
                  class="form-control"
                  v-model="form.modelo"
                  name="txtModel"
                  @change='deleteModel($event)'
                >
                  <option id='selected_model' :value="form.modelo" style="background-color:gainsboro">{{ form.modelo }}</option>                  
                  <option
                    v-for="modelo in this.form.modelos"
                    :key="modelo.id"
                    :value="modelo.mod_name"
                  >
                    {{ modelo.mod_name }}
                  </option>
                </select>
              </div>
            </div>        
          </div>
          <br />

          <div class="row">
            <div class="col-md-4">
              <label for="inputCategoria">Categoria</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputCategoria"
                  class="form-control"
                  v-model="form.categoria"
                  name="txtModel"
                  @change='deleteCategory($event)'
                >
                  <option id='selected_category' :value="form.categoria" style="background-color:gainsboro">{{ form.categoria }}</option>                  
                  <option
                    v-for="categoria in this.form.categorias"
                    :key="categoria.id"
                    :value="categoria.id"
                  >
                    {{ categoria.name }}
                  </option>
                </select>
              </div>
            </div> 
            <div class="col-md-4">
              <label for="inputInstituicao">Instituição</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputInstituicao"
                  class="form-control"
                  v-model="form.instituicao"
                  name="txtModel"
                >
                  <option id='selected_instituition' :value="form.instituicao" style="background-color:gainsboro">{{ form.instituicao }}</option>                  
                  <option
                    v-for="instituicao in this.form.instituicoes"
                    :key="instituicao.id"
                    :value="instituicao.social_name"
                  >
                    {{ instituicao.name }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="InputStatus">Situação</label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="InputStatus1"
                    value="1"
                    v-model="form.status"
                  />
                  <label class="form-check-label" for="exampleRadios1">
                    Ativo
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="InputStatus2"
                    v-model="form.status"
                    value="0"
                  />
                  <label class="form-check-label" for="exampleRadios2">
                    Bloqueado
                  </label>
                </div>
                </div>                
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
    asset: Array
  },

  data: () => {
    return {
      form: {
        id: null,
        name: null,
        patrimonio: null,
        instituicao: null,
        modelo: null,
        categoria: null,
        status: null,        
        
        instituicoes: [],
        modelos: [],
        categorias: [],
        preserveState: true,
      },
    };
  },
  created() {
    
    axios.get("/instituicoes/listar-todos").then((response) => {
      this.form.instituicoes = response.data;  
    });
    axios.get("/modelos/listar-todos").then((response) => {
      this.form.modelos = response.data;
      console.log(response);
    });
    axios.get("/categorias/listar-todos").then((response) => {
      this.form.categorias = response.data;
    });


    this.form.id = this.$page.props.asset[0].ass_id,
    this.form.name = this.$page.props.asset[0].ass_name,
    this.form.patrimonio = this.$page.props.asset[0].ass_pat,
    this.form.instituicao = this.$page.props.asset[0].social_name,
    this.form.modelo = this.$page.props.asset[0].mod_name,
    this.form.categoria = this.$page.props.asset[0].cat_name,
    this.form.status = this.$page.props.asset[0].ass_status


    if (this.errors['accessLevel']) {
      console.log(this.errors['accessLevel']);
      bootbox.alert({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>" +
            this.errors['accessLevel'] +
          "</span>",
      });
    }
    

  },

  methods: {

    /*deleteInstituition: function() {
      $('#selected_instituition').remove();
    },*/
    deleteCategory: function() {
      $('#selected_category').remove();
    },
    deleteModel: function() {
      $('#selected_model').remove();
    },

    sendForm() {
      this.$inertia.post("/patrimonio/atualizar/"+this.form.id,
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