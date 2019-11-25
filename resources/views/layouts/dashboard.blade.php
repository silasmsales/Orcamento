@extends('layouts.app')

@section('content')

  <header class="main-header">
      <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Sair') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Menu de Saídas -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Saídas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('saidas.index')}}"><i class="fa fa-circle-o"></i> Quadro de saídas  </a></li>
          </ul>
        </li>


        <!-- Menu de entradas -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Entradas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('entradas.index')}}"><i class="fa fa-circle-o"></i> Quadro de entradas  </a></li>
          </ul>
        </li>
        <!-- Menu de despesas -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Despesas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('despesas.index')}}"><i class="fa fa-circle-o"></i> Quadro de despesas  </a></li>
          </ul>
        </li>

        <!-- Menu de contas -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Contas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('contas.index')}}"><i class="fa fa-circle-o"></i> Quadro de contas  </a></li>
          </ul>
        </li>

        <!-- Menu de configurações -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Configurações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <!-- Menu tipos de contas -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Tipos de conta</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('tipo_contas.index')}}"><i class="fa fa-circle-o"></i> Quadro de tipos de contas</a></li>
              </ul>
            </li>

            <!-- Menu tipos de despesas -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Tipos de despesas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('tipo_despesas.index')}}"><i class="fa fa-circle-o"></i> Quadro de tipos de despesa  </a></li>
              </ul>
            </li>

            <!-- Menu subtipos de despesas -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Subtipos de despesas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('subtipo_despesas.index')}}"><i class="fa fa-circle-o"></i> Quadro de subtipos de despesa  </a></li>
              </ul>
            </li>

          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('board')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

@endsection
