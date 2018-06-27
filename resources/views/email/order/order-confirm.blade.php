<head><style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Open+Sans|Roboto');

        body { font-family: 'Open Sans', sans-serif!important; }
        a[href^="tel"]{
            color:inherit;
            text-decoration:none;
            outline:0;
        }
        a:hover, a:active, a:focus{
            outline:0;
        }
        a:visited{
            color:#FFF;
        }
        span.MsoHyperlink {
            mso-style-priority:99;
            color:inherit;
        }
        span.MsoHyperlinkFollowed {
            mso-style-priority:99;
            color:inherit;
        }
    </style>
</head><body style="margin: 0; padding: 0;background-color:#EEEEEE;"><div style="display:none;font-size:1px;color:#333333;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
@php $details = (object) $details; @endphp

</div>
<table cellspacing="0" style="margin:0 auto; width:100%; border-collapse:collapse; background-color:#EEEEEE;">
    <tbody>
    <tr>
        <td align="center" style="padding:20px 23px 0 23px">
            <table width="600" style="background-color:#FFF; margin:0 auto; border-radius:5px">
                <tbody>
                <tr>
                    <td align="center">
                        <table width="500" style="margin:0 auto">
                            <tbody>
                            <tr>
                                <td align="center" style="padding:40px 0 35px 0"><a href="{{route('home')}}" target="_blank" style="color:#128ced; text-decoration:none;outline:0;"><img alt="" src="https://thietbivesinhroyal.vn/wp-content/uploads/2017/07/Logo-Royal-new.png" border="0"></a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family:'Roboto', Arial !important">
                                    <h4>Kính chào quý khách {{$details->customer}}</h4>
                                    @if($details->status == 'Pending')
                                        <p>Công ty Royal đã nhận được đơn hàng mã #{{$details->order_id}}, đặt ngày {{$details->created_at}}.</p>
                                        <p>Xin quý khách vui lòng liên hệ với chúng tôi qua hotline <span style="color: red"><strong>0912229992</strong></span> để xác nhận đơn hàng.</p>
                                    @elseif($details->status == 'Processing')
                                        <p>Công ty Royal xác nhận đơn hàng mã #{{$details->order_id}}, đặt ngày {{$details->created_at}} đang trong quá trình xử lý.</p>
                                        <p>Chúng tôi sẽ gửi thông báo đến quý khách qua một email khác ngay khi sản phẩm được giao cho đơn vị vận chuyển</p>
                                    @elseif($details->status == 'Packing')
                                    <p>Công ty Royal xác nhận đơn hàng mã #{{$details->order_id}}, đặt ngày {{$details->created_at}} đang trong quá trình đóng gói.</p>
                                    <p>Chúng tôi sẽ gửi thông báo đến quý khách qua một email khác ngay khi sản phẩm được giao cho đơn vị vận chuyển</p>
                                    @elseif($details->status == 'Shipping')
                                    <p>Công ty Royal xác nhận đơn hàng mã #{{$details->order_id}}, đặt ngày {{$details->created_at}} đang trong quá trình vận chuyển.</p>
                                    @elseif($details->status == 'Complete')
                                    <p>Công ty Royal xác nhận đơn hàng mã #{{$details->order_id}}, đặt ngày {{$details->created_at}} đã được hoàn thành</p>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" cellspacing="0" style="padding:0 0 30px 0; vertical-align:middle">
                        <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border:1px solid #E5E5E5">
                            <tbody>
                            <tr>
                                <td width="276" style="vertical-align:top; border-right:1px solid #E5E5E5">
                                    <table style="width:100%; border-collapse:collapse">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align:top; padding:18px 18px 8px 23px;">
                                                <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0;">
                                                    Thông tin đơn hàng
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="">
                                            <td style="vertical-align:top; padding:0 18px 18px 23px">
                                                <table width="100%" style="border-collapse:collapse">
                                                    <tbody>
                                                    <tr>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                Mã đơn hàng:
                                                            </p>
                                                        </td>
                                                        <td align="left" style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                #{{$details->order_id}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                Ngày mua hàng
                                                            </p>
                                                        </td>
                                                        <td align="left" style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                {{presentDate($details->created_at)}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 10px 0;">
                                                                Tổng hóa đơn
                                                            </p>
                                                        </td>
                                                        <td align="left" style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 10px 0;">
                                                                {{presentPrice($details->billing_total)}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 10px 0;">
                                                                Hình thức thanh toán
                                                            </p>
                                                        </td>
                                                        <td align="left" style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 10px 0;">
                                                                {{$details->payment_methods->name}}
                                                            </p>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="vertical-align:top">
                                    <table width="100%" style="border-collapse:collapse">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align:top; padding:18px 18px 8px 23px;">
                                                <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0;">
                                                    Địa chỉ nhận hàng
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:top; padding:0 18px 18px 23px;">
                                                <table width="100%" style="border-collapse:collapse">
                                                    <tbody>
                                                    <tr>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                Địa chỉ
                                                            </p>
                                                        </td>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                {{$details->billing_address}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                Quận / Huyện
                                                            </p>
                                                        </td>
                                                        <td style="font-family:'Roboto', Arial !important">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0;">
                                                                {{$details->billing_province}}
                                                            </p>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-family:'Roboto', Arial !important;">
                                                            <p style="font-size:16px; color:#000; margin:0;padding:0;">
                                                                Thành phố
                                                            </p>
                                                        </td>
                                                        <td style="font-family:'Roboto', Arial !important;">
                                                            <p style="font-size:16px; color:#000; margin:0;padding:0;">
                                                                {{$details->billing_city}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" cellspacing="0" style="padding:0; vertical-align:middle">
                        <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border-bottom:1px solid #E5E5E5">
                            <tbody>
                            <tr>
                                <td align="left" style="padding:15px 0 15px 15px;" width="117"><p style="font-size:16px; text-transform:uppercase; color:#333333; margin:0; font-weight:900;; ">
                                        Sản phẩm</p></td>
                                <td align="left" width="240">

                                </td>
                                <td width="60" align="right" style="font-family:'Roboto', Arial !important"><p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:center;">
                                        Số lượng</p></td>
                                <td width="80" align="right" style="font-family:'Roboto', Arial !important;padding-right:10px;"><p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:right;">
                                        Giá</p></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                @foreach($details->products as $product)
                    <tr>
                        <td style=";padding:0;" align="center">
                            <table width="550" style="border-collapse:collapse;margin: 0 auto;border-bottom: 1px solid #EBEBEB">
                                <tbody>
                                <tr>

                                    <td width="117" align="right" style="padding:24px 0 24px 10px; text-align:left;">
                                        <a href="{{route('catalog.product',['slug'=> $product->slug])}}" target="_blank" style="text-decoration:none; color:#000; outline:0;">
                                            <img src="{{getFeaturedImageProduct($product->image)}}" border="0">
                                        </a>
                                    </td>
                                    <td width="270" style="vertical-align:middle; padding:0 0 0 10px;;">
                                        <p style="font-size:16px; margin:0; color:#000; line-height:20px;">
                                            <a>{{$product->name}}</a>
                                        </p>
                                    </td>
                                    <td align="center" width="60" style="vertical-align:middle;;padding:0;">
                                        <p style="font-size:18px; color:#000; margin:0;;text-align:center;">
                                            {{$product->pivot->quantity}}
                                        </p>
                                    </td>
                                    <td align="center" width="80" style="font-family:'Roboto', Arial !important;padding:0 10px 0 0;">

                                        <p style="font-size:18px; color:#bc0101; margin:0;;text-align:center;font-weight:bold;text-align: right;">
                                            <a>{{presentPrice($product->final_price)}}</a>
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td align="center" style="padding-top:24px; padding-bottom:20px">
                        <table width="520" style="border-collapse:collapse">
                            <tbody>

                            <tr>
                                <td align="right" style="padding-bottom:15px;">
                                    <p style="font-size:18px; color:#000; font-weight:900; margin:0;">
                                        Miễn phí giao hàng :
                                    </p>
                                </td>
                                <td align="right" style="padding-bottom:15px;">
                                    <p style="font-size:18px; color:#bc0101; font-weight:bold; margin:0;">
                                       0
                                    </p>
                                </td>
                                <td align="right" style="padding-bottom:15px;">
                                    <p style="font-size:18px; color:#000; font-weight:900; margin:0;">
                                        Tổng cộng:
                                    </p>
                                </td>
                                <td align="right" style="padding-bottom:15px;">
                                    <p style="font-size:18px; color:#bc0101; font-weight:bold; margin:0;">
                                        {{presentPrice($details->billing_total)}}
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding-top:20px">
            <table width="604" style="border-collapse:collapse;background-color:#FFF;; border-radius:5px">
                <tbody>
                <tr>
                    <td colspan="4" style="vertical-align:middle;background-color: #128ced;border-radius: 5px 5px 0 0;">
                        <table style="background-color:#128ced; width:100%; border-radius:5px 5px 0 0; border-collapse:collapse">
                            <tbody>
                            <tr>
                                <td align="center" style="vertical-align:middle; padding:22px 0;">
                                    <p style="color:#FFF; font-size:18px; margin:0;">
                                        Gọi cho chúng tôi qua số điện thoại <a href="tel:1-800-672-4399" target="_blank" style="text-decoration:none; color:#FFF; font-weight:bold;outline:0;">1-800-672-4399</a>
                                        hoặc trả lời email này
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0">
                        <table cellpadding="20" style="width:100%; border-collapse:collapse">
                            <tbody>
                            <tr>
                                <td align="center" style="border-right:1px solid #EBEBEB;">
                                    <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                                        <p style="margin:0 0 8px 0"><img src="https://www.chewy.com/static/cms/lp/email/csr_icon.png" border="0"></p>
                                        <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0;">
                                            Hỗ trợ  <br>
                                            Khách hàng
                                        </p>
                                    </a>
                                </td>
                                <td align="center" style="border-right:1px solid #EBEBEB;; vertical-align:bottom">
                                    <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                                        <p style="margin:0 0 14px 0;"><img src="https://www.chewy.com/static/cms/lp/email/shipping_icon.png" border="0"></p>
                                        <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0;">
                                            Free Shipping <br>
                                            Đơn hàng 5 000 000
                                        </p>
                                    </a>
                                </td>
                                <td align="center" style="border-right:1px solid #EBEBEB;">
                                    <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                                        <p style="margin:0 0 8px 0"><img src="https://www.chewy.com/static/cms/lp/email/moneyback_icon.png" border="0">
                                        </p>
                                        <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0;">
                                            Bảo hành <br>
                                            5 năm
                                        </p>
                                    </a>
                                </td>
                                <td align="center" style="font-family:'Roboto', Arial !important">
                                    <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=ShippingConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                                        <p style="margin:0 0 8px 0"><img src="https://www.chewy.com/static/cms/lp/email/return_icon.png" border="0"></p>
                                        <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0;">
                                            Hỗ trợ <br>
                                            Phụ kiện
                                        </p>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding-top:29px; padding-bottom:50px">
            <table style="width:100%">
                <tbody>
                <tr>
                    <td align="center" style="font-family:'Roboto', Arial !important">
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>