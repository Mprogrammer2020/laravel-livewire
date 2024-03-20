<script>
  function  isMenuOpen(){
    var asideMenu = document.querySelector('aside');
    asideMenu.classList.toggle('active');
    }
</script>

<header>
    <div class="w-100 px-3 pt-2 d-block d-md-none ">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <a href="" class="mobLogo">
                    <img src="{{ asset('user_assets/images/logo.svg') }}" alt="" class="">
                </a>
            </div>
            <div class="col-auto">
                <button class="btn  "  onclick="isMenuOpen()"><i class="material-icons align-middle">segment</i> <span>MENU</span></button>
            </div>
        </div>
        <hr class="my-2">
    </div>
    <div class="headInner">
        <div class="row justify-content-center">
            <div class="col menus">
                <ul class="row list-unstyled ">
                    <li class="col">
                        <a class="" href="{{route('user.education')}}">Education</a>
                    </li>
                    {{-- <li class="col">
                        <a class="">Community</a>
                    </li> --}}
                    <li class="col">
                        <a class="" href="{{route('user.support')}}">Support</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto  ">
                <a class="btn" href="{{ route('user.signout') }}">
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>
