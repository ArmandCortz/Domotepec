<footer class="bg-dark text-white mt-4 text-center text-white-50 py-3 shadow">
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
            <div class="col">

                <h2 style="text-align: left">Contactanos</h2>
                <div class="container" style="padding-left: 20px; text-align: left">
                    <p><i class="fas fa-phone"></i> +503 9876 0245</p>
                    <p><i class="fas fa-envelope"></i> administracion@domotepec.com</p>
                    <p> <i class="fas fa-phone"></i> +503 9876 0245</p>
                </div>
            </div>
            <div class="col">
                <h2 style="text-align: left">Siguenos</h2>
                <div class="container" style="padding-left: 20px; text-align: left">
                    <a><i class="fab fa-facebook"></i> @ {{ env('APP_NAME') }}</a> <br>

                    <a><i class="fab fa-instagram-square"></i> @ {{ env('APP_NAME') }}</a> <br>

                    <a><i class="fab fa-twitter-square"></i> @ {{ env('APP_NAME') }}</a>
                </div>
            </div>
            <div class="col">
                <h2 style="text-align: left">¿Qué ofrecemos?</h2>
                <div class="container" style="padding-left: 20px; text-align: left">
                    <p>
                        <i class="fas fa-person-biking"></i> Ciclismo <br>
                        <i class="fas fa-person-walking"></i> Senderismo <br>

                    </p>
                </div>
            </div>
            <div class="col">
                <h2 style="text-align: left">Conócenos</h2>
                <div class="container" style="padding-left: 20px; text-align: left">
                    <p>
                        Fundadores <br>
                        Politicas 
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{ config('app.name') }} | Copyright @ {{ date('Y') }}
</footer>
