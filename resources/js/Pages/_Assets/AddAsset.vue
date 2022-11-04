<template>
  <layout class="backg-color">

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastrar Patrimônio</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddUser">
          <div class="row">
            <div class="col-md-12 topico-add">
              <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
            </div>
          </div>     
          <hr> 
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
                  name="txtinstituition"
                >                
                  <option
                    v-for="modelo in this.form.modelos"
                    :key="modelo.mod_id"
                    :value="modelo.mod_id"
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
              <label for="inputCategory">Categoria</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputCategory"
                  class="form-control"
                  v-model="form.categoria"
                  name="txtinstituition"
                >                
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
                  v-model="form.instituicao"
                  name="txtinstituition"
                >                
                  <option
                    v-for="instituicao in this.form.instituicoes"
                    :key="instituicao.id_instituition"
                    :value="instituicao.id_instituition"
                  >
                    {{ instituicao.social_name }}
                  </option>
                </select>
              </div>
            </div>     
            <div class="col-md-4">
              <button type="submit" class="btn btn-success btnCadastrar">
                Registrar
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
    departments: Array
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
        
        instituicoes: [],
        modelos: [],
        categorias: []
      },
    };
  },

  created() {
    axios.get("/instituicoes/listar-todos").then((response) => {
      this.form.instituicoes = response.data;  
    });
    axios.get("/modelos/listar-todos").then((response) => {
      this.form.modelos = response.data;
    });
    axios.get("/categorias/listar-todos").then((response) => {
      this.form.categorias = response.data;
    });
  },

  methods: {

    sendForm() {
      this.$inertia.post("//tcc-unisales.herokuapp.com/patrimonio/registrar", this.form,
        {          
          forceFormData: true,
          preserveScroll: false,
          _token: this.$page.props.csrf_token,
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
                "<span style='font-weight:bold; position: relative; top: 5px;'>Patrimônio registrado com sucesso!</span>",
            });

            //this.form.name = null;
            //this.form.instituicao = null;

          },
        }
      );
    },
  },
};
</script>