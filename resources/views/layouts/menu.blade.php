<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <p>Products</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('scorders.index') }}"
       class="nav-link {{ Request::is('scorders*') ? 'active' : '' }}">
        <p>Scorders</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('orderdetails.index') }}"
       class="nav-link {{ Request::is('orderdetails*') ? 'active' : '' }}">
        <p>Orderdetails</p>
    </a>
</li>


