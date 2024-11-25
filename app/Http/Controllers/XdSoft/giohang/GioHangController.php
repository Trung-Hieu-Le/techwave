<?php

namespace App\Http\Controllers\XdSoft\giohang;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{
    public function addToCart($id)
    {
        if (!session()->has('account_id')) {
            return redirect("/login")->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng!');
        }
        $course = Course::findOrFail($id);
        // $cart = session()->get('cart', []);
        $accountId = session('account_id');
        $user = DB::table('users')->where('id', $accountId)->first();
        $invoice = DB::table('invoices')
            ->where('id_user', $accountId)
            ->where('trang_thai', 'Chưa mua')
            ->orderBy("id", "desc")
            ->first();
        if (!$invoice) {
            $invoiceId = DB::table('invoices')->insertGetId([
                'ho_ten' => $user->display_name,
                'email' => $user->email,
                'so_dien_thoai' => $user->phone,
                'gia_goc' => 0,
                'gia_giam' => 0,
                'ghi_chu' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'id_user' => $accountId,
                'trang_thai' => 'Chưa mua'
            ]);
        } else {
            $invoiceId = $invoice->id;
        }

        $exists = DB::table('invoice_relationships')
            ->where('id_invoice', $invoiceId)
            ->where('id_course', $course->id)
            ->exists();

        if (!$exists) {
            DB::table('invoice_relationships')->insert([
                'id_invoice' => $invoiceId,
                'id_course' => $course->id,
            ]);
            DB::table('invoices')->where('id', $invoiceId)->increment('gia_goc', $course->gia_goc);
            DB::table('invoices')->where('id', $invoiceId)->increment('gia_giam', $course->gia_giam);
        }
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function addToCartNow($id)
    {
        if (!session()->has('account_id')) {
            return redirect("/login")->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng!');
        }
        $course = Course::findOrFail($id);
        // $cart = session()->get('cart', []);
        $accountId = session('account_id');
        $user = DB::table('users')->where('id', $accountId)->first();
        $invoice = DB::table('invoices')
            ->where('id_user', $accountId)
            ->where('trang_thai', 'Chưa mua')
            ->orderBy("id", "desc")
            ->first();
        if (!$invoice) {
            $invoiceId = DB::table('invoices')->insertGetId([
                'ho_ten' => $user->display_name,
                'email' => $user->email,
                'so_dien_thoai' => $user->phone,
                'gia_goc' => 0,
                'gia_giam' => 0,
                'ghi_chu' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'id_user' => $accountId,
                'trang_thai' => 'Chưa mua'
            ]);
        } else {
            $invoiceId = $invoice->id;
        }

        $exists = DB::table('invoice_relationships')
            ->where('id_invoice', $invoiceId)
            ->where('id_course', $course->id)
            ->exists();

        if (!$exists) {
            DB::table('invoice_relationships')->insert([
                'id_invoice' => $invoiceId,
                'id_course' => $course->id,
            ]);
            DB::table('invoices')->where('id', $invoiceId)->increment('gia_goc', $course->gia_goc);
            DB::table('invoices')->where('id', $invoiceId)->increment('gia_giam', $course->gia_giam);
        }
        return redirect()->route('xdsoft.cart')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    // public function updateCart(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Đã thêm phần mềm vào giỏ!');
    //     }
    // }

    public function deleteCartItem(Request $request)
    {
        if (!session()->has('account_id')) {
            return redirect("/login")->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này!');
        }
        $userId = session('account_id');
        $invoice = DB::table('invoices')
            ->where('id_user', $userId)
            ->where('trang_thai', 'Chưa mua')
            ->orderBy("id", "desc")
            ->first();

        if ($invoice) {
            DB::table('invoice_relationships')
                ->where('id_invoice', $invoice->id)
                ->where('id_course', $request->id)
                ->delete();
        }
    }

    public function deleteAllCart(Request $request)
    {
        if (!session()->has('account_id')) {
            return redirect("/login")->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này!');
        }
        $userId = session('account_id');
        $invoice = DB::table('invoices')
            ->where('id_user', $userId)
            ->where('trang_thai', 'Chưa mua')
            ->orderBy("id", "desc")
            ->first();

        if ($invoice) {
            DB::table('invoice_relationships')
                ->where('id_invoice', $invoice->id)
                ->delete();
            DB::table('invoices')
                ->where('id', $invoice->id)
                ->delete();
        }
        return redirect()->back()->with('success', 'Đã xóa tất cả khóa học khỏi giỏ hàng!');
    }

    public function insertCart(Request $request)
    {
        //TODO: sửa lại cái này
        // try{
        if (!session()->has('account_id')) {
            return redirect("/login")->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này!');
        }

        $accountId = session('account_id');
        $invoice = DB::table('invoices')
            ->where('id_user', $accountId)
            ->where('trang_thai', 'Chưa mua')
            ->orderBy("id", "desc")
            ->first();
        dd($invoice, $request->request);
        $giohang = session()->get('cart');
        DB::table('invoices')->insert([
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'gia_goc' => $request->gia_goc,
            'gia_giam' => $request->gia_giam,
            'ghi_chu' => $request->ghi_chu,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),
            'id_user' => session('account_id')
        ]);
        $cartID = DB::table('invoices')->select("id")
            ->orderBy("id", "desc")
            ->first();
        foreach ($giohang as $key) {
            if (!empty($key)) {
                DB::table('invoice_relationships')->insert([
                    'id_invoice' => $cartID->id,
                    'id_course' => $key['id'],
                ]);
            }
        }
        GioHangController::deleteAllCart($request);
        return redirect()->back()->with('success', 'Đặt hàng thành công!');
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function processVNPay(Request $request)
    {
        // dd($request->request);
        $vnp_TmnCode = "1JSVVDV5"; // Mã website tại VNPAY
        $vnp_HashSecret = "7YJN7PE7K8RAG0LHGXIVDQ3YWYDMBAKV"; // Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');

        $vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng #{$vnp_TxnRef}";
        $vnp_OrderType = "TechWave";
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }

        return redirect($vnp_Url);
    }
    public function vnpayReturn(Request $request)
    {
        if ($request->vnp_ResponseCode == '00') {
            // Cập nhật trạng thái hóa đơn
            DB::table('invoices')
                ->where('id_user', session('account_id'))
                ->where('trang_thai', 'Chưa mua')
                ->update(['trang_thai' => 'Đã thanh toán']);
            return redirect()->route('xdsoft.cart')->with('success', 'Thanh toán thành công!');
        } else {
            DB::table('invoices')
                ->where('id_user', session('account_id'))
                ->where('trang_thai', 'Chưa mua')
                ->update(['trang_thai' => 'Lỗi thanh toán']);
            return redirect()->route('xdsoft.cart')->with('error', 'Thanh toán không thành công!');
        }
    }
}
