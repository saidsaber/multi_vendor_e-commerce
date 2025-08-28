<p>Hello <span class="font-weight-normal text-dark">{{ auth('web')->user()->name }}
        <a href="{{ route('logout') }}">Log out</a>
</p>
