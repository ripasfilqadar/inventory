<div id="wrapper" style="padding-left: 0px;">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>page/pinjam">NCC Inventory</a>
            </div>
             <div class="navbar-header-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="text" href="<?php echo base_url()?>page/detail_pinjam">List Barang Yang Anda Pinjam(<?php
                echo $this->cart->total_items();?>)</a>
            </div>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">
            <h1 class="page-header" style="text-align:center">
                Login
            </h1>
            <?php echo form_open('login/masuk'); ?>
                <div class="form" style="margin-left:36%">
                    <div class="form-group" style="width:50%">
                        <label>User Name</label>
                        <input class="form-control" placeholder="User Name" name="nama">
                    </div>
                    <div class="form-group" style="width:50%">
                        <label>Password</label>
                        <input class="form-control" placeholder="Password" name="password" type="password">
                    </div>
                    <input type="submit" class="btn btn-default" value="Login">
                </div>
            </form>
            
                