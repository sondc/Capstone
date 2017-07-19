<?php
namespace App\Http\Controllers;
use App\Http\DAO\K004_DAO;
use App\Models\Reservation_Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Common\DateTimeUtil;

class K004Controller extends Controller{

    //region View K004_1, K004_2, K004_3
    public function K004_1_View(){

        return view('Reception.K004_1');
    }

    public function K004_2_View(){

        return view('Reception.K004_2');
    }

    public function K004_3_View(Request $request){
        $res_id = $request->res_id;
        $check_in= DateTimeUtil::ConvertDateToString($request->check_in);
        $check_out=DateTimeUtil::ConvertDateToString($request->check_out);
        $type_name = $request->type_name;
        $no_room = $request->no_room;
        return view("Reception.K004_3")->with([
            'txtRoomType' => $type_name,
            'txtRoomNo' => $no_room,
            'txtResId' => $res_id,
            'txtCheckOut' => $check_out,
            'txtCheckIn' => $check_in
        ]);
    }
    //endregion

    //region K004_1

    //K004_1 GetStatus
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReservationStatus(){
        $K004_DAO = new K004_DAO();
        $status = $K004_DAO->getStatus();
        if($status==[]){
            $status = "";
            return response()->json($status);
        }

        return response()->json($status);
    }

    //K004_1 Get Reservation

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|Response
     */
    public function getReservation(Request $request){

        $fname = $request->fname;
        $idCard = $request->idCard;
        $status = $request->status;
        //dd($idCard);
        $K004_DAO = new K004_DAO();
        $resList = $K004_DAO->selectReservation($fname,$idCard,$status);

        //count record reservation
        $count=count($resList);
        //convert to date check-in, check-out
        for($i =0; $i<$count; $i++){
            $resList[$i]->check_in= DateTimeUtil::ConvertStringToDate($resList[$i]->check_in);
            $resList[$i]->check_out= DateTimeUtil::ConvertStringToDate($resList[$i]->check_out);
        }

        $result = json_encode($resList);

        if($result==[]){
            $result="";
            return response()->json($result);
        }

        return response($result);

    }
    //endregion

    //region K004_2
    //K004_2 Get guest information
    /**
     * @param Request $request
     * @return $this
     */
    public function getGuest(Request $request){
        if($request->res_id ==""){
            return view("Reception.K004_2")->with([
                'id' => "",
                'check_in' => "",
                'check_out' => "",
                'noroom'=>"",
                'name' => "",
                'phone' => "",
                'email' => "",
                'idCard' => "",
                'company' => "",
                'address' => "",
                'company_phone'=>"" ,
                'country' => "",
                'nopeople' => "",
                'note'=>""

            ]);
        }
        $res_id = $request->res_id;
        $K004_DAO = new K004_DAO();
        $guest = $K004_DAO->getGuestData($res_id);
        $room = $K004_DAO->getReservationDetail($res_id);
        $result = array_merge($guest,$room);

        return view("Reception.K004_2")->with([
            'id' => $result[0]->id,
            'guest_id' =>$result[0]->guest_id,
            'check_in' => DateTimeUtil::ConvertStringToDate($result[0]->check_in),
            'check_out' => DateTimeUtil::ConvertStringToDate($result[0]->check_out),
            'noroom' => $result[0]-> number_of_room,
            'name' => $result[0]->name,
            'phone' => $result[0]->phone,
            'email' => $result[0]->mail,
            'idCard' => $result[0]->identity_card,
            'company' => $result[0]->company,
            'address' => $result[0]->address,
            'company_phone' => $result[0]-> company_phone,
            'country' => $result[0]-> country,
            'status' => $result[0]->status_id,
            'nopeople' => $result[0]->number_of_adult,
            'note'=>""

        ]);



    }

    //K004_2: Load Room Booked (Room Type)
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function loadBookedRoom(Request $request){
        $res_id = $request -> res_id;
        $K004_DAO = new K004_DAO();
        $room_type = $K004_DAO->loadRoomType($res_id);

        return \response($room_type);
    }

    //K004_2: Update Reservation
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function updateReservation(Request $request){
        //update guest information
        $guest_id   = $request-> guest_id;
        $fullname   = $request-> fullname;
        $address    = $request-> address ;
        $idcard     = $request-> idcard  ;
        $country    = $request-> country ;
        $phonetxt   = $request-> phonetxt;
        $company    = $request-> company ;
        $email      = $request-> email   ;

        //update reservation
        $res_id     = $request->res_id;
        $check_in   = DateTimeUtil::ConvertDateToString($request->check_in) ;
        $check_out  = DateTimeUtil::ConvertDateToString($request->check_out);
        $numpeople  = $request->numpeople;
        $noroom     = $request->noroom ;
        $status     = $request->status;

        $K004_DAO = new K004_DAO();
        $update_guest = $K004_DAO->updateGuest($guest_id,$fullname,$address,$idcard,$country,$phonetxt,$company,$email);

        if($update_guest == 1){
            $update_reservation = $K004_DAO->updateReservation($res_id,$check_in,$check_out,$numpeople,$noroom,$status);
            if($update_reservation == 1){
                return \response('1');
            }
        }

        return \response('1');
    }
    //endregion

    //region K004_3
    //K004_3: Load Room in reservation_detail to checked
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function checkRoom(Request $request){
        $res_id = $request->res_id;
        $K004_DAO = new K004_DAO();
        $resRoom = $K004_DAO->selectRoomOfReservation($res_id);
        return \response($resRoom);
    }

    //K004_3: Get Room Available
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function getRoomFree(Request $request){
        $type_name = $request->type_name;
        $res_id = $request->res_id;
        $check_in= $request->check_in;
        $check_out=$request->check_out;
        $K004_DAO = new K004_DAO();
        $roomFree = $K004_DAO->selectRoomFree($res_id,$type_name,$check_in,$check_out);
        //dd($roomFree);
        return \response($roomFree);

    }

    //K004_3: Save room after changed
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function saveRoom(Request $request){
        $res_id = $request -> res_id;
        $detail_id = $request -> detail_id;
        $room_id = $request -> room_id;
        $count = count($detail_id);
        $K004_DAO = new K004_DAO();
        $result = $K004_DAO->updateRoomNumber($detail_id, $room_id, $count);
        return \response($result);
    }
    //endregion


}