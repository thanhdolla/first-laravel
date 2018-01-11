<style>
    [view=footer] {
        display: flex;
        flex-flow: column nowrap;
        align-items: center;

        background: rgb(37, 57, 81);

        padding-top: 40px;
        padding-bottom: 40px;
    }

    [view=footer] .main {
        width: 1000px;
        display: flex;
    }

    [view=footer] .main > :not(:first-child) {
        margin-left: 8px;
    }
    
    [view=footer] .main > :not(:last-child) {
        margin-right: 8px;
    }

    [view=footer] .main .col {
        width: 25%;
    }

    [view=footer] h4 {
        color: orange;
        font-family: Lato !important;
        font-size: 24px;
        
        margin-bottom: 10px;
    }

    [view=footer] h4 span {
        font-family: Material Icons;
        font-size: 24px;
    }
    
    [view=footer] p {
        color: white;
        font-family: Arial !important;
        font-size: 14px;
    }
</style>

<div view="footer">
    <div class="main">
        <div class="col">
            <h4><span>flight</span> Giao hàng qua nước ngoài</h4>
            <p>Chúng tôi có hỗ trợ giao hàng qua nước ngoài với chi phí ship phù hợp với mọi loại đối tượng.</p>
        </div>

        <div class="col">        
            <h4><span>perm_phone_msg</span> Hỗ trợ tư vấn</h4>
            <p>Hỗ trợ tư vấn nhiệt tình 24/7. Giúp quý khách giải tỏa thắc mắc.</p>
        </div>

        <div class="col">
            <h4><span>card_giftcard</span> Quà tặng khuyến mãi</h4>
            <p>Chúng tôi thường tổ chức các chương trình khuyến mãi vào dịp lễ tết.</p>
        </div>

        <div class="col">
            <h4><span>check_circle</span> Đảm bảo</h4>
            <p>Chúng tôi cam đoan sẽ giao hàng cho bạn trong vòng 48h đồng hồ kể từ khi xác nhận đơn đặt hàng của bạn.</p>
        </div>
    </div>
</div>


