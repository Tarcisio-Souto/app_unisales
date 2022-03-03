<template onload="sidepanel()">
  <main>
    <header>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav
          class="navbar navbar-inverse fixed-top"
          id="sidebar-wrapper"
          role="navigation"
        >
          <ul class="sidebar-nav">
            <div class="sidebar-header">
              <div class="sidebar-brand">
                <a href="#">
                  <img
                    src="https://unisales.br/wp-content/uploads/2020/03/logo.svg"
                    alt="VHLogo"
                    width="150px"
                  />
                </a>
              </div>
            </div>
            <li><Link href="/"><i class="fas fa-home icons-menu"></i>Início </Link></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-users icons-menu"></i>Usuários</a
              >
              <ul class="dropdown-menu animated fadeInLeft menuUsuarios" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="#/users/register"><i class="fas fa-user-plus icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="#/users/list"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-building icons-menu"></i>Instituições</a
              >
              <ul class="dropdown-menu animated fadeInLeft menuInstituicoes" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="#/instituitions/register"><i class="fas fa-user-plus icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="#/instituitions/list"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
                <li><Link href="#/departments/list"><i class="fas fa-solid fa-briefcase icons-menu"></i>Departamentos</Link></li>
                <li><Link href="#/sectors/list"><i class="fas fa-solid fa-door-closed icons-menu"></i>Setores</Link></li>
                <li><Link href="#/positions/list"><i class="fas fa-solid fa-sitemap icons-menu"></i>Cargos</Link></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-car icons-menu"></i>Bens</a
              >
              <ul class="dropdown-menu animated fadeInLeft menuBens" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="#/assets/register"><i class="fas fa-plus-circle icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="#/assets/list"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
                <li><Link href="#/categories/list"><i class="fas fa-duotone fa-layer-group icons-menu"></i>Categorias</Link></li>
                <li><Link href="#/assets/occurrences"><i class="fas fa-solid fa-exclamation icons-menu"></i>Ocorrências</Link></li>                
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-wrench icons-menu"></i>Locações</a
              >
              <ul class="dropdown-menu animated fadeInLeft menuLocacoes" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="#/loans/register"><i class="fas fa-user-plus icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="#/loans/list"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
                <li><Link href="#/loans/reserves"><i class="fas fa-solid fa-calendar icons-menu"></i>Reservas</Link></li>
              </ul>
            </li>

            <li><Link href="#/sobre"><i class="fas fa-info-circle icons-menu"></i>Sobre</Link></li>            
            <li>
              <Link href="#/logout"><i class="fas fa-sign-out-alt icons-menu"></i>Sair</Link>
            </li>
          </ul>
        </nav>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button
            type="button"
            class="hamburger animated fadeInLeft is-closed"
            data-toggle="offcanvas"
          >
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
          <div class="container">
            <article>
              <slot />
            </article>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
      </div>
      <!-- /#wrapper -->
    </header>
  </main>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link,
  },
  mounted() {
    $(function () {
      var trigger = $(".hamburger"),
        overlay = $(".overlay"),
        isClosed = false;
      trigger.click(function () {
        hamburger_cross();
      });
      function hamburger_cross() {
        if (isClosed == true) {
          overlay.hide();
          trigger.removeClass("is-open");
          trigger.addClass("is-closed");
          isClosed = false;
        } else {
          overlay.show();
          trigger.removeClass("is-closed");
          trigger.addClass("is-open");
          isClosed = true;
        }
      }
      $('[data-toggle="offcanvas"]').click(function () {
        $("#wrapper").toggleClass("toggled");
      });
    });
  }
  
};
</script>