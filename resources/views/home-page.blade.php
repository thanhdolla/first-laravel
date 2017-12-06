@extends('template')

@section('index')
  <div data-component="app-root">
    <header>
      <nav>
        <a href="/">
          <div class="logo">
            <h1>BKSmart</h1>
          </div>
        </a>

        <div class="space"></div>

        <div class="nav-bar">
          <div class="tab tab-home">
            <a href="/">Home</a>
          </div>

          <div class="tab tab-about">
            <a href="/about">About</a>
          </div>

          <div class="tab tab-signup-login">
            <a href="/login">Login</a>
            /
            <a href="/signup">Signup</a>
          </div>
        </div>
      </nav>
    </header>

    <div class="dashboard">
      <div class="side-bar">
        <ul class="categories">
          <li>All</li>
          <li>Samsung</li>
          <li>Laptop</li>
          <li>IPhone</li>
        </ul>
      </div>

      <div class="products">
        <div class="product">
          <div class="image">
            <div class="product-name">
              Samsung Galaxy J7
            </div>
          </div>

          <div class="price">
            3.500.000đ
          </div>
        </div>

        
        <div class="product">
          <div class="image">
            <div class="product-name">
              Samsung Galaxy J7
            </div>
          </div>

          <div class="price">
            3.500.000đ
          </div>
        </div>

        
        <div class="product">
          <div class="image">
            <div class="product-name">
              Samsung Galaxy J7
            </div>
          </div>

          <div class="price">
            3.500.000đ
          </div>
        </div>

        
        <div class="product">
          <div class="image">
            <div class="product-name">
              Samsung Galaxy J7
            </div>
          </div>

          <div class="price">
            3.500.000đ
          </div>
        </div>

        
        <div class="product">
          <div class="image">
            <div class="product-name">
              Samsung Galaxy J7
            </div>
          </div>

          <div class="price">
            3.500.000đ
          </div>
        </div>

        <div class="product">
          <div class="image">
            <div class="product-name">
              Samsung Galaxy J7
            </div>
          </div>

          <div class="price">
            3.500.000đ
          </div>
        </div>
      </div> <!-- End of products -->
    </div> <!-- End of dashboard -->

    <div class="news">
      <div class="headline">News</div>

      <div class="items">
        <div class="item">

        </div>
      </div> <!-- End of items -->
    </div> <!-- End of news -->

    <footer></footer>
  </div>
@endsection