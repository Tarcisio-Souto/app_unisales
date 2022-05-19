<template>
  <layout class="backg-color">

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Editar Usuário</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddUser">
          <h4><span style="font-weight: bold">Dados Pessoais</span></h4>
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
              <label for="inputCpf">CPF</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCpf"
                  class="form-control"
                  placeholder="CPF (só números)"
                  v-model="form.cpf"
                  name="txtCpf"
                  v-mask="'###.###.###-##'"
                />
              </div>
              <div v-for="(erro, cpf) in errors" :key="cpf">
                <div v-if="cpf == 'cpf'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="InputGenre">Sexo</label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="InputGenre1"
                    value="m"
                    v-model="form.genre"
                  />
                  <label class="form-check-label" for="exampleRadios1">
                    Masculino
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="InputGenre2"
                    v-model="form.genre"
                    value="f"
                  />
                  <label class="form-check-label" for="exampleRadios2">
                    Feminino
                  </label>
                </div>
                </div>                
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputAge">Idade</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-birthday-cake"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputAge"
                  class="form-control"
                  placeholder="Idade"
                  v-model="form.age"
                />
              </div>
              <div v-for="(erro, age) in errors" :key="age">
                <div v-if="age == 'age'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputDtBirth">Data de Nascimento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDtBirth"
                  class="form-control"
                  v-model="form.dt_birth"
                  name="txtDtBirth"
                  v-mask="'##/##/####'"
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputRace">Raça</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputRace"
                  class="form-control"
                  v-model="form.race"
                  name="txtRace"
                  @change='deleteRace($event)'
                >
                  <option id='selected_race' :value="form.race" style="background-color:gainsboro">{{ form.race }}</option>                  
                  <option
                    v-for="race in races"
                    :key="race.id"
                    :value="race.id"
                  >
                    {{ race.name }}
                  </option>
                </select>
              </div>
            </div>

          </div>
          <br />
          <div class="row">

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
            
            <div class="col-md-4">
              <label for="inputPosition">Cargo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputPosition"
                  class="form-control"
                  v-model="form.position"
                  name="txtPosition"
                  @change='deletePosition($event)'
                >
                  <option id='selected_position' :value="form.position" style="background-color:gainsboro">{{ form.position }}</option>                  
                  <option
                    v-for="position in positions"
                    :key="position.id"
                    :value="position.id"
                  >
                    {{ position.name }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputDtAdmission">Data de Admissão</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDtAdmission"
                  class="form-control"
                  v-model="form.dt_adm"
                  name="txtDtAdm"
                  v-mask="'##/##/####'"
                />
              </div>
            </div>
            
          </div>
          <br>

          <div class="row">
            <div class="col-md-4">
              <label for="inputDepartment">Departamento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputDepartment"
                  class="form-control"
                  v-model="form.department"
                  name="txtDepartment"
                  @change="getSetores($event)"
                >
                  <option id="selected" :value="form.department" style="background-color:gainsboro">{{ form.department }}</option>
                  <option
                    v-for="department in departments"
                    :key="department.id"
                    :value="department.id"                    
                  >
                    {{ department.name }}
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputSetor">Setor</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputSetor"
                  class="form-control"
                  v-model="form.sector"
                  name="txtSetor"
                  @change='deleteSector($event)'
                >
                  <option selected :value="form.sector" style="background-color:gainsboro">{{ form.sector }}</option>                  
                  <option
                    v-for="sector in this.form.sectors"
                    :key="sector.id"
                    :value="sector.id"
                  >
                    {{ sector.name }}
                  </option>
                </select>
              </div>
            </div>            

            <div class="col-md-4">
              <label for="inputRegistration">Matrícula</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-mobile-alt"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputRegistration"
                  class="form-control"
                  placeholder="Matrícula"
                  v-model="form.registration"
                  name="txtRegistration"
                />
              </div>
            </div>
                       
          </div>
          <br />

          <div class="row">
            <div class="col-md-4">
              <label for="InputPhoneNumber">Telefone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-mobile-alt"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="InputPhoneNumber"
                  class="form-control"
                  placeholder="Telefone"
                  v-model="form.phone_number"
                  name="txtPhoneNumber"
                  v-mask="['(##) #####-####', '(##) ####-####']"
                />
              </div>
            </div> 
            <div class="col-md-4">
              <label for="inputEmail">Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input
                  type="email"
                  id="inputEmail"
                  class="form-control"
                  placeholder="Email"
                  v-model="form.email"
                  name="txtEmail"
                />
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>


          <br />
          <br /><br />
          <h4><span style="font-weight: bold">Endereço</span></h4>
          <hr />
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputZipCode">CEP</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">CEP</div>
                </div>
                <input
                  type="text"
                  id="inputZipCode"
                  class="form-control"
                  placeholder="Informe o CEP"
                  v-model="form.zipcode"
                  name="txtZipCode"
                />
              </div>
            </div>
            <div class="col-md-1 col-spinner">
              <div class="fa fa-spinner fa-spin"></div>
            </div>
            <div class="col-md-4"></div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-6">
              <label for="inputStreet">Logradouro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-road"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputStreet"
                  class="form-control"
                  placeholder="Rua, Av., Rod."
                  v-model="form.street"
                  name="txtStreet"
                />
              </div>
            </div>
            <div class="col-md-2">
              <label for="inputNumber">Número</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Nº</div>
                </div>
                <input
                  type="text"
                  id="inputNumber"
                  class="form-control"
                  placeholder="Número"
                  v-model="form.number"
                  name="txtNumber"
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputDistrict">Bairro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-home"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputDistrict"
                  class="form-control"
                  placeholder="Informe o bairro"
                  v-model="form.district"
                  name="txtDistrict"
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputComplement">Complemento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Complemento</div>
                </div>
                <input
                  type="text"
                  id="inputComplement"
                  class="form-control"
                  placeholder="Informe o complemento"
                  v-model="form.complement"
                  name="txtComplemento"
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputCity">Cidade</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-city"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCity"
                  class="form-control"
                  placeholder="Informe a cidade"
                  v-model="form.city"
                  name="txtCity"
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputState">Estado</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-flag"></i>
                  </div>
                </div>
                <select
                  id="inputState"
                  class="form-control"
                  v-model="form.state"
                  name="txtState"
                >
                  <option selected :value="form.state" style="background-color:gainsboro">{{ form.state }}</option>                  
                  <option value="1">Acre</option>
                  <option value="2">Alagoas</option>
                  <option value="3">Amapá</option>
                  <option value="4">Amazonas</option>
                  <option value="5">Bahia</option>
                  <option value="6">Ceará</option>
                  <option value="7">Distrito Federal</option>
                  <option value="8">Espírito Santo</option>
                  <option value="9">Goiás</option>
                  <option value="10">Maranhão</option>
                  <option value="11">Mato Grosso</option>
                  <option value="12">Mato Grosso do Sul</option>
                  <option value="13">Minas Gerais</option>
                  <option value="14">Pará</option>
                  <option value="15">Paraíba</option>
                  <option value="16">Paraná</option>
                  <option value="17">Pernambuco</option>
                  <option value="18">Piauí</option>
                  <option value="19">Rio de Janeiro</option>
                  <option value="20">
                    Rio Grande do Norte
                  </option>
                  <option value="21">Rio Grande do Sul</option>
                  <option value="22">Rondônia</option>
                  <option value="23">Roraima</option>
                  <option value="24">Santa Catarina</option>
                  <option value="25">São Paulo</option>
                  <option value="26">Sergipe</option>
                  <option value="27">Tocantins</option>
                  <option value="28">Estrangeiro</option>
                </select>
              </div>
            </div>            
          </div>
          <br>
          
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
    positions: Array,
    instituitions: Array,
    races: Array,
    departments: Array,
    user: Array
  },

  mounted: () => {
    $(document).ready(function () {
      function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#inputStreet").val("");
        $("#inputDistrict").val("");
        $("#inputCity").val("");
        $('select[name="inputState"]');
        //$("#inputState").val("");
      }

      //Quando o campo cep perde o foco.
      $("#inputZipCode").blur(function () {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, "");

        //Verifica se campo cep possui valor informado.
        if (cep != "") {
          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;

          //Valida o formato do CEP.
          if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#inputStreet").val("");
            $("#inputDistrict").val("");
            $("#inputCity").val("");
            $("#inputState").val("");

            //Consulta o webservice viacep.com.br/
            $.getJSON(
              "https://viacep.com.br/ws/" + cep + "/json/?callback=?",
              function (dados) {
                if (!("erro" in dados)) {
                  //Atualiza os campos com os valores da consulta.

                  $("#inputStreet").val(dados.logradouro);
                  $("#inputDistrict").val(dados.bairro);
                  $("#inputCity").val(dados.localidade);
                  document.getElementById("inputState").value = dados.uf;
                } //end if.
                else {
                  //CEP pesquisado não foi encontrado.
                  limpa_formulário_cep();
                  alert("CEP não encontrado.");
                }
              }
            );
          } //end if.
          else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
          }
        } //end if.
        else {
          //cep sem valor, limpa formulário.
          limpa_formulário_cep();
        }
      });
    });
  },

  data: () => {
    return {
      form: {
        id: null,
        name: null,
        cpf: null,
        age: null,
        genre: null,
        email: null,
        instituition: null,
        position: null,
        dt_adm: null,
        registration: null,
        phone_number: null,
        password: null,
        confirm_password: null,
        street: null,
        number: null,
        district: null,
        city: null,
        state: null,
        zipcode: null,
        complement: null,
        department: null,
        race: null,
        dt_birth: null,
        sector: null,
        sectors: [],
        preserveState: true,
      },
    };
  },
  created() {
    
    this.form.id = this.$page.props.user[0].us_id,
    this.form.name = this.$page.props.user[0].name_user,
    this.form.cpf = this.$page.props.user[0].cpf,
    this.form.age = this.$page.props.user[0].age,
    this.form.genre = this.$page.props.user[0].genre,
    this.form.email = this.$page.props.user[0].email,
    this.form.instituition = this.$page.props.user[0].fantasy_name,
    this.form.position = this.$page.props.user[0].name_pos,
    this.form.dt_adm = this.$page.props.user[0].dt_adm_format,
    this.form.registration = this.$page.props.user[0].registration,
    this.form.phone_number = this.$page.props.user[0].phone_number,
    this.form.street = this.$page.props.user[0].street,
    this.form.number = this.$page.props.user[0].number,
    this.form.district = this.$page.props.user[0].district,
    this.form.city = this.$page.props.user[0].city,
    this.form.state = this.$page.props.user[0].state
    this.form.zipcode = this.$page.props.user[0].zipcode,
    this.form.complement = this.$page.props.user[0].complement,
    this.form.department = this.$page.props.user[0].dept_name,
    this.form.race = this.$page.props.user[0].race_name,
    this.form.dt_birth = this.$page.props.user[0].dt_birth


  },
  methods: {

    deletePosition: function() {
      $('#selected_position').remove();
    },

    deleteSector: function() {
      $('#selected_sector').remove();
    },

    deleteInstituition: function() {
      $('#selected_instituition').remove();
    },

    deleteRace: function() {
      $('#selected_race').remove();
    },

    getSetores: function () {

      $('#selected').remove();

      axios.get("/setor/"+this.form.department).then((response) => {
        this.form.sectors = response.data;
        console.log(response);
      });

    },


    sendForm() {
      this.$inertia.post("/usuario/update/"+this.form.id,
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