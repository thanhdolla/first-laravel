@extends('template')

@section('index')
  <div data-component="app-root">
    <header>
      <nav>
        <a href="{{ route('index') }}">
          <div class="logo">
            <h1>BKSmart</h1>
          </div>
        </a>

        <div class="space"></div>

        <div class="nav-bar">
          <div class="tab tab-home">
            <a href="{{ route('index') }}">Home</a>
          </div>

          <div class="tab tab-about">
            <a href="{{ route('about') }}">About</a>
          </div>

          <div class="tab tab-signup-login">
            <a href="">Login</a>
            /
            <a href="">Signup</a>
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

      <div class="articles">
        <div class="article">
          <div class="left">
            <div class="image"></div>
          </div>

          <div class="right">
            <div class="title">
              <h2>Nokia 10 sắp lên kệ tháng 1 này</h2>
            </div>

            <div class="content">
              <p>Với hệ điều hành Android 8 Oreo, Nokia mong đợi dòng sản phẩm mới này của họ sẽ đem lại sự thu hút đối với thị trường.</p>
            </div>

            <div class="action">
              <button>Xem thêm</button>
            </div>
          </div>
        </div>
        
        <div class="article">
          <div class="left">
            <div class="image"></div>
          </div>

          <div class="right">
            <div class="title">
              <h2>Nokia 10 sắp lên kệ tháng 1 này</h2>
            </div>

            <div class="content">
              <p>Với hệ điều hành Android 8 Oreo, Nokia mong đợi dòng sản phẩm mới này của họ sẽ đem lại sự thu hút đối với thị trường.</p>
            </div>

            <div class="action">
              <button>Xem thêm</button>
            </div>
          </div>
        </div>
        
        <div class="article">
          <div class="left">
            <div class="image"></div>
          </div>

          <div class="right">
            <div class="title">
              <h2>Nokia 10 sắp lên kệ tháng 1 này</h2>
            </div>

            <div class="content">
              <p>Với hệ điều hành Android 8 Oreo, Nokia mong đợi dòng sản phẩm mới này của họ sẽ đem lại sự thu hút đối với thị trường.</p>
            </div>

            <div class="action">
              <button>Xem thêm</button>
            </div>
          </div>
        </div>
        
        <div class="article">
          <div class="left">
            <div class="image"></div>
          </div>

          <div class="right">
            <div class="title">
              <h2>Nokia 10 sắp lên kệ tháng 1 này</h2>
            </div>

            <div class="content">
              <p>Với hệ điều hành Android 8 Oreo, Nokia mong đợi dòng sản phẩm mới này của họ sẽ đem lại sự thu hút đối với thị trường.</p>
            </div>

            <div class="action">
              <button>Xem thêm</button>
            </div>
          </div>
        </div>
        
        <div class="article">
          <div class="left">
            <div class="image"></div>
          </div>

          <div class="right">
            <div class="title">
              <h2>Nokia 10 sắp lên kệ tháng 1 này</h2>
            </div>

            <div class="content">
              <p>Với hệ điều hành Android 8 Oreo, Nokia mong đợi dòng sản phẩm mới này của họ sẽ đem lại sự thu hút đối với thị trường.</p>
            </div>

            <div class="action">
              <button>Xem thêm</button>
            </div>
          </div>
        </div>
        
        <div class="article">
          <div class="left">
            <div class="image"></div>
          </div>

          <div class="right">
            <div class="title">
              <h2>Nokia 10 sắp lên kệ tháng 1 này</h2>
            </div>

            <div class="content">
              <p>Với hệ điều hành Android 8 Oreo, Nokia mong đợi dòng sản phẩm mới này của họ sẽ đem lại sự thu hút đối với thị trường.</p>
            </div>

            <div class="action">
              <button>Xem thêm</button>
            </div>
          </div>
        </div>
      </div> <!-- End of articles -->
    </div> <!-- End of news -->

    <footer></footer>
  </div>
@endsection