<div class="row">
    <div class="login-box">
        <div class="login-logo">
            <a href="../domingos"><b>TUDO É EDUCAÇÃO</b>TE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

            <p class="login-box-msg">Área Destinada ao Login.</p>
            <form action="login/autentica" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Login/Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Memorizar?
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <input type="hidden" name="token_csrf" value="<?= $token ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Logar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OU -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Entre
                    usando
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Entre
                    usando
                    Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href="#">Esqueceu Sua Senha?</a><br>
            <a href="../domingos/cadastro.php" class="text-center">Não possui uma conta - Cadastre-se aqui!</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</div>