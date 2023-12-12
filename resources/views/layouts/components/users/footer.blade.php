<footer class="bg-dark text-white  text-center text-white-50 py-5 shadow">
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
            <div class="col">

                <h2 style="text-align: left">Contactanos</h2>
                <div class="container" style="padding-left: 20px; text-align: left">
                    <p><i class="fa fa-phone"></i> +503 9876 0245</p>
                    <p><i class="fa fa-envelope"></i> administracion@domotepec.com</p>
                    <p> <i class="fa fa-phone"></i> +503 9876 0245</p>
                </div>
            </div>
            <div class="col">
                <h2 style="text-align: left">Siguenos</h2>
                <div class="container" style="padding-left: 20px; text-align: left">
                    <a><i class="fa fa-facebook"></i> @ {{ config('app.name') }} </a> <br>

                    <a><i class="fa fa-instagram"></i> @ {{ config('app.name') }} </a> <br>

                    <a><i class="fa fa-twitter-square"></i> @ {{ config('app.name') }} </a>
                </div>
            </div>
            <div class="col">
                <h2 style="text-align: left">¿Qué ofrecemos?</h2>
                <div class="container" style="padding-left: 20px; text-align: left">
                    <p>
                        <i class="fa fa-person-biking"></i> Ciclismo <br>
                        <i class="fa fa-person-walking"></i> Senderismo <br>

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
