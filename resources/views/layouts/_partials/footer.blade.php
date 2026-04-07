<footer class="footer seccion-oscura">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3">
                <h5>Sobre nosotros</h5>
                <p><a href="{{ route('about') }}">Quiénes somos</a></p>
                <p><a href="{{ route('jobs') }}">Trabaja con nosotros</a></p>
            </div>

            <div class="col-12 col-md-3">
                <h5>Atención al cliente</h5>
                <p><a href="{{ route('faq') }}">Preguntas frecuentes</a></p>
                <p><a href="{{ route('returns') }}">Devoluciones</a></p>
                <p><a href="{{ route('shipping') }}">Información de envío</a></p>
                <p><a href="{{ route('contact') }}">Contacto</a></p>
            </div>

            <div class="col-12 col-md-3">
                <h5>Información legal</h5>
                <p><a href="{{ route('terms') }}">Condiciones de uso</a></p>
                <p><a href="{{ route('privacy') }}">Política de privacidad</a></p>
                <p><a href="{{ route('cookies') }}">Política de cookies</a></p>
                <p><a href="{{ route('legal') }}">Aviso legal</a></p>
            </div>

            <div class="col-12 col-md-3">
                <h5>Extras</h5>
                <ul class="social-icons">
                    <li>
                        <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter-x"></i></a>
                    </li>
                    <li>
                        <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                    </li>
                    <li>
                        <a href="https://pinterest.com" target="_blank"><i class="bi bi-pinterest"></i></a>
                    </li>
                </ul>
                <p><a href="{{ route('payment') }}">Métodos de pago</a></p>
                <p><a href="{{ route('newsletter') }}">Newsletter</a></p>
            </div>
        </div>
    </div>
</footer>