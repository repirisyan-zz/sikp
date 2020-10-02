<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3">
                <?php echo form_open('Staff/Staff/login','class="form-center"');?>
                <div class="card" style="border-radius: 1rem;">
                    <h5 class="card-header text-muted"><i class="now-ui-icons ui-1_lock-circle-open"></i>&nbsp;Login Staff
                    </h5>
                    <div class="card-body">
                        <div class="form-group" style="margin-top: 20px;">
                            <input type="text" name="username" placeholder="Nama Staff" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text" style="color: red;"><?php
            echo form_error('username',"<i class=\"far fa-times-circle\"></i> &nbsp;");?></small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control"
                                id="exampleInputPassword1">
                            <small id="emailHelp" class="form-text" style="color: red;"><?php
            echo form_error('password',"<i class=\"far fa-times-circle\"></i> &nbsp;");?></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <small style="color: red;"><?php echo $this->session->flashdata('login')?></small><br>
                        <small><a href="<?=base_url('Landing')?>" class="text-decoration-none"><i
                                    class="fa fa-home"></i>
                                Kembali ke
                                beranda</a></small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>