<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li><a href="<?= base_url('index')?>"><i class="fa fa-desktop"></i> <span>Principal</span></a></li>
        <li><a href="<?= base_url('Tanque/index')?>"><i class="fa fa-industry"></i> <span>Tanque</span></a></li>
        <li><a href="<?= base_url('Medidas/form')?>"><i class="fa fa-area-chart"></i> <span>Medidas</span></a></li>

        <li class="treeview ">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Aforo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Aforo/index');?>"><i class="fa fa-search "></i> <span>Consultar</span></a></li>
            <li><a href="<?php echo base_url('Aforo/importar');?>"><i class="fa fa-file-excel-o"></i> <span>Importar</span></a></li>
          </ul>
        </li>
        <li><a href="<?= base_url('Usuario/')?>"><i class="fa fa-user"></i> <span>Usuario</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
