<?php use App\Core\Csrf; ?>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4">
                    Login
                </h2>
                <form method="POST" action="/login">
                    <input type="hidden" name="_token" value="<?= Csrf::token() ?>">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary">Login</button>

                </form>
            </div>
        </div>

        <p class="mt-3">
            Don't have an account?
            <a href="/register">
                Register here
            </a>
        </p>

    </div>
</div>