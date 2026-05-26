<?php

use App\Core\Csrf;
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4">
                    Register
                </h2>
                

                <form method="POST" action="/register">

                    <input type="hidden" name="_token" value="<?= Csrf::token() ?>">

                    <div class="mb-3">

                        <label>Name</label>

                        <input type="text" name="name" class="form-control" required >

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email" name="email" class="form-control" required >
                    </div>

                    <div class="mb-3">
                        <label>Password</label>

                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary">
                        Register
                    </button>
                    
                </form>
                <hr>
                <p class="mb-4">
                    <a href="/login">
                        Go Back to Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>