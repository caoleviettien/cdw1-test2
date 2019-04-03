<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        return view('auth.update', [
          'user' => $user
        ]);
    }

    // hàm lấy các giá trị của flight được chọn hiển thị lên form trang đặt vé
    public function booking($flight_id)
    {
      // chọn dữ liệu từ khóa ngoại đến nhiều bảng
      $flights = DB::table('flights')
                      ->join('airplanes', 'flights.flight_airplane_id', 'airplanes.id')
                      ->join('airports as airport_from', 'flights.flight_airport_from_id', 'airport_from.id')
                      ->join('airports as airport_to', 'flights.flight_airport_to_id', 'airport_to.id')
                      ->join('flight_classes as class', 'flights.flight_class_id', 'class.id')
                      ->select(
                        'flights.*',
                        'airplanes.airplane_name',
                        'airport_from.airport_code as airport_from_code', 
                        'airport_from.airport_name as airport_from_name',
                        'class.flight_class_name as class_name',
                        'airport_from.city_name as city_from',
                        'airport_to.airport_code as airport_to_code',
                        'airport_to.airport_name as airport_to_name',
                        'airport_to.city_name as city_to'
                      );
     // lưu các giá trị thành dạng biến để gửi sang trang hiển trị                 
     $user_id = Auth::user()->id;
     $user_email = Auth::user()->email;
     $user_phone = Auth::user()->phone;
     $user_name = Auth::user()->name;
      // trả về view đặt vé thông tin của chuyến bay và người dặt vé
      return view('flight-book', [
        'flight' =>  $flights->where('flights.id', '=', $flight_id)->first(),
        'user_id' => $user_id,
        'user_email' => $user_email,
        'user_phone' =>  $user_phone,
        'user_name' =>  $user_name
      ]);
    }

    // hàm cập nhật thông tin của user
    public function update(Request $request)
    {
      // lấy thông tin user hiện đã đăng nhập vào
      $user = Auth::user();
      // hàm kiểm tra dữ liệu nhập vào từ form
  		$validator = Validator::make($request->all(), [
  			'name' => 'required|string|max:255',
  			'dob' => 'required',
  			'gender' => 'required',
  			'phone' => 'required|digits:10',
  			'address' => 'required',
        'newPassword' => 'nullable|min:6'
  		]);
      // nếu dữ liệu nhập vào chưa đầy đủ trả về và báo lỗi ngược lại lưu giá trị vào database
  		if ($validator->fails()) {
              return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
          } else {
          		$user->name = $request->name;
          		$user->dob = $request->dob;
          		$user->gender = $request->gender;
          		$user->phone = $request->phone;
          		$user->address = $request->address;
              // kiểm tra giá trị password có nhập vào hay ko, nếu có thay đổi password trong database
          		if (isset($request->newPassword)) {
          			$user->password = bcrypt($request->newPassword);
          		}
          		$user->save(); // lưu xuống db

          		session()->flash('message', 'Update infomation successfully.'); // thông bá kết quả sửa thành công
          		return redirect()->back();
        		}
    }
}