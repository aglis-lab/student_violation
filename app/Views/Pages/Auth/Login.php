<?= $this->extend('Layout/AuthTemplate') ?>

<?= $this->section('content') ?>

<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
</style>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form action="/auth/login?type=<?= $data['type'] ?>" method="post">

                    <?= $this->include('Layout/Message') ?>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" />
                        <label class="form-label" for="form1Example13">Username / NIS</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                        <label class="form-label" for="form1Example23">Password</label>
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-lg btn-block px-5">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>