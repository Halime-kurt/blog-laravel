</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    @php $socials=['facebook','twitter','github','linkedin','youtube','instagram'] @endphp
                    @foreach($socials as $social)
                        @if($config->$social!=null)
                        <li class="list-inline-item">
                            <a target="_blank" href="{{$config->$social}}">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-user"></i>
                            <i class="  fab fa-{{$social}} fa-stack-1x fa-inverse"></i>
                        </span>
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
                <p class="small text-center text-muted fst-italic">Copyright &copy; {{date('Y')}}
                    - {{$config->title}}</p>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('front/js/scripts.js')}}"></script>
</body>
</html>
