<style>
  [view=sidebar] {
    margin-bottom: 20px;
  }

  [view=sidebar] h2 {
    font-family: Lato;
    font-size: 24px;
  }

  [view=sidebar] input {
      padding: 5px;
      border: none;
      outline: none;
  }

  [view=sidebar] .input .bottom-line {
      display: flex;
      justify-content: center;

      width: 100%;
      height: 2px;
      background: #eee;
  }

  
  [view=sidebar] .input .bottom-line::after {
      content: '';
      height: 100%;
      width: 0px;
      background: black;
  }

  [view=sidebar] .input.focus .bottom-line::after {
      width: 100%;
  }

  [view=sidebar] .input .bottom-line::after {
      transition: 0.5s;
  }

  [view=sidebar] .input input {
      width: 100%;
      font-size: 14px !important;
      padding: 0px;
      margin: 0px;
  }

  [view=sidebar] input {
      padding: 8px !important;
  }

  [view=sidebar] .input {
      margin-bottom: 8px;
  }

  [view=sidebar] button {
      padding: 5px 20px;
      font-size: 14px !important;
      background: orange;
      color: white;
      border: none;
      outline: none;

      margin-top: 20px;
  }

  [view=sidebar] ul li {
    font-family: Lato;
    font-size: 14px;
  }

  [view=sidebar] .news .info p {
    font-family: Lato;
    font-size: 14px;
  }
</style>

<div view="sidebar">
    <h2>Tìm theo giá</h2>

    <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
        <div class="input">
            <input type="text" name="gianho" placeholder="Từ">
            <div class="bottom-line"></div>
        </div>

        <div class="input">
            <input type="text" name="gialon" placeholder="Đến">
            <div class="bottom-line"></div>
        </div>

        <button type="submit">Tìm kiếm</button>
    </form>
</div>

<div view="sidebar">
  <h2>Loại sản phẩm</h2>

  <br/>

  <ul>
      @foreach($loai_sp3 as $loai)
        <a href="{{route('loai-san-pham',$loai->id)}}">
          <li><?php echo $loai->ten_loai_sp ?></li>
        </a>
      @endforeach
  </ul>
</div>

<style>
  [view=sidebar] .news {
    display: flex;
    width: 400px;
    margin-bottom: 20px;
  }

  [view=sidebar] .news .image {
    flex: 0 0 auto;
    width: 100px;
  }

  [view=sidebar] .news .image img {
    object-fit: cover;
  }

  [view=sidebar] .news .info {
    margin-left: 10px;
  }
</style>

<div view="sidebar">
  <h2>Thông báo mới</h2>

  <br/>

  <?php foreach ($tintuc as $row): ?>
      <div class="news">
        <div class="image">
          <img src="upload/tintuc/add/{{$row->anh_tb}}" width="100px" height="80px">
        </div>

        <div class="info">
          <p>
            <?php echo $row->tieu_de_tb ?>
          </p>

          <div>
            <a href='tintuc/{{$row->id }}'>
              <button>Xem thêm</button>
            </a>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
</div>

<script>
  document.querySelectorAll('[view=sidebar] input').forEach(function (el) {
      el.addEventListener('focus', function () {
          el.parentElement.classList.add('focus')
      })

      el.addEventListener('blur', function () {
          el.parentElement.classList.remove('focus')
      })
  })
</script>