<?php

namespace frontend\controllers;

use common\models\fu;
use common\models\Products;
use common\models\services;
use common\models\MemberContract;
use common\models\Contract;
use common\models\ContractFu;
use common\models\ProductFu;
use common\models\ContractService;
use common\models\ServiceDifferent;
use common\models\Procedures;
use common\models\ProcedureFu;
use common\models\FuProgress;
use common\models\FuVegatable;
use common\models\Havest;
use yii;

class ContractController extends \yii\web\Controller {

    public function actionIndex() {

        $fu = fu::find()->all();
        $pro = Products::find()->all();
        $ser = services::find()->all();
        return $this->render('index', ['fu' => $fu, 'pro' => $pro, 'ser' => $ser]);
    }

    public function actionCreatecontract() {

        $contract = new Contract();
        $membercontact = new MemberContract();
        $contactfu = new ContractFu();
        if (Yii::$app->request->get()) {
            $request = Yii::$app->request->get();

            $contract->status = 0;
            $contract->start_date = date('m/d/Y h:i:s a', time());
            $contract->description = "";
            if ($contract->save()) {
                $membercontact->uid = (int) $request['userid'];
                $membercontact->contract_no = $contract->contract_code;
                $membercontact->save();

                foreach ($request as $key => $value) {
                    if ($key . ("checkboxService")) {
                        $contactService = new ContractService();
                        $contactService->contract_no = $contract->contract_code;
                        $contactService->service_id = $value;
                        $contactService->save();
                    }
                }
                $contactfu->fuid = $request['selectMast'];
                $contactfu->contractid = $contract->contract_code;
                if ($contactfu->save()) {
                    foreach ($request as $key => $value) {
                        if ($key . ("checkboxProduct")) {
                            $productFu = new ProductFu();
                            $productFu->fuid = $request['selectMast'];
                            $productFu->product_id = $value;
                            $productFu->save();
                        }
                    }
                }
            }
            return $this->redirect('/site/index');
        }
    }

    public function actionProfile() {
        if (Yii::$app->user->isGuest) {
            return $this->gohome();
        }
        return $this->render('profile');
    }

    public function actionContract() {

        $futrong = fu::find()->where(['status' => 0])->orderby(['fuid' => 'ASC'])->limit(12)->all();
        $fu = fu::find()->all();
        $pro = Products::find()->all();
        $ser = services::find()->all();
        return $this->render('contract', ['fu' => $fu, 'products' => $pro, 'services' => $ser, 'futrong' => $futrong]);
    }

    public function actionTaohopdong() {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $contract = new Contract();
        $membercontact = new MemberContract();

        $uid = (int) Yii::$app->user->getId();

        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->post();
            $ruong = $request['ruong'];

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $transaction = \Yii::$app->db->beginTransaction();

            try {
                $contract->status = 0;
                $contract->created_at = time();
                $contract->description = "";
                $contract->save();
                $membercontact->uid = (int) $uid;
                $membercontact->contract_no = $contract->contract_code;
                $membercontact->save();
                foreach ($ruong as $ru) {
                    $contactfu = new ContractFu();
                    $sp = $ru['sanpham'];
                    $fuinpr = $ru['ruong'];
                    $sql = "select a.* FROM fu a join Fu_vegatable b where a.fuid=b.fu_id and a.status_thue=0 and b.product_id=$sp order by a.fuid ASC";
                    $futr = Yii::$app->db->createCommand($sql)->queryOne();
                    $fuid = $futr['fuid'];
                    $futrong = FuVegatable::find()->where(['fu_id' => $fuid])->one();

                    if ($fuinpr == '0') {
                        $contactfu->fuid = $futrong->fu_id;
                        $futrong->status_thue = 1;
                        $futrong->save();
                    } else {
                        $contactfu->fuid = (int) $fuinpr;
                        $futrong->status_thue = 1;
                        $futrong->save();
                    }
                    // $contactfu->fuid=$futrong->fuid;                    
                    $contactfu->contractid = $contract->contract_code;
                    $contactfu->save();
//                     $fu= new fu();                   
//                     $fu->fuid=$futrong->fuid; 
//                     $fu->status=1;               
//                     $fu->save();    

                    $productFu = new ProductFu();

                    $productFu->fuid = $contactfu->fuid;

                    $productFu->product_id = $ru['sanpham'];
                    $productFu->save();
                }
                if (isset($request['dichvu'])) {
                    $dichvu = $request['dichvu'];
                    foreach ($dichvu as $dic) {
                        $contactService = new ContractService();
                        $contactService->contract_no = $contract->contract_code;
                        $contactService->service_id = $dic['dichvu'];
                        $contactService->save();
                    }
                }
                $transaction->commit();
                \Yii::$app->getSession()->setFlash('success', 'ban da tao hop dong thanh cong');
                return [
                    'massage' => 'ok roi day',
                    'code' => 200,
                    'id' => $contract->contract_code
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'massage' => 'khong ok',
                    'code' => 500,
                ];
            }
        }
    }

    public function actionChitiethopdong($hopdong) {

        if (Yii::$app->user->isGuest) {
            return $this->gohome();
        }
        $uid = (int) Yii::$app->user->getId();
        $sql = "select a.contract_code,a.status FROM contract a join member_contract b on a.contract_code=b.contract_no where b.uid=$uid and a.contract_code=$hopdong";
        $query = Yii::$app->db->createCommand($sql)->queryOne();
        return $this->render('chitiethopdong', ['que' => $query]);
    }

    public function actionThuongthao() {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $contract = new Contract();
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->post();
            $id = $request['id'];
            $contract = Contract::find()->where(['contract_code' => $id])->one();
            $contract->status = 1;
            if ($contract->save(false)) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'massage' => 'ok roi day',
                    'code' => 100,
                ];
            } else {
                return [
                    'massage' => 'khong ok',
                    'code' => 500,
                ];
            }
        } else {
            return [
                'massage' => 'khong ok',
                'code' => 500,
            ];
        }
    }

    public function actionAddservice() {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->post();
        }
        $id = $request['id'];
        $name = '';
        $description = '';
        if (isset($request['name'])) {
            $name = $request['name'];
        }
        if (isset($request['description'])) {
            $description = $request['description'];
        }
        $service = new ServiceDifferent();
        $service->name = $name;
        $service->contractID = $id;
        $service->status = 1;
        $service->description = $description;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($service->save()) {
            return [
                'massage' => 'ok roi day',
                'code' => 100,
            ];
        } else {
            return [
                'massage' => 'khong ok',
                'code' => 500,
            ];
        }
    }

    public function actionViewprocedure() {

        if (Yii::$app->request->get()) {
            $request = Yii::$app->request->get();
            $id = $request['id'];
            $product = Procedures::find()->where(["product_id" => $id])->all();
            $procedures = Procedures::find()->where(["product_id" => $id])->all();

            return $this->renderAjax('viewprocedures', ['procedures' => $procedures]);
            die();
        } else {
            
        }
    }

    public function actionViewprogress($contract_code) {
        $conFu = ContractFu::find()->where(['contractid' => $contract_code])->all();

        return $this->render('viewprogress', ['contract_fu' => $conFu]);
    }

    public function actionAllfuinfor() {
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->post();
            $id = $request['id'];

            $product = Products::find()->where(["product_id" => $id])->one();
            $countFu = FuVegatable::find()->where(["product_id" => $id, 'status' => 0])->count();
            $fugr = FuVegatable::find()->where(["product_id" => $id, 'status' => 1])->all();
            return $this->renderAjax('allfuinfo', ['countFu' => $countFu, 'fugr' => $fugr, 'product' => $product]);
        } else {
            
        }
    }

    public function actionThuhoach() {
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->post();
            $havest = new Havest();
            $havest->UserID = (int) Yii::$app->user->getId();
            $havest->FuID = (int) $request["fuid"];
            $sp = FuVegatable::find()->where(['fu_id' => $request["fuid"]])->one()->product_id;

            $tensp = Products::find()->where(['product_id' => $sp])->one()->product_name;

            $havest->masp = $tensp;
            $havest->khoiluong_thuhoach = (int) $request["soluong"];
            $havest->ngaytao = time();
            $havest->Ngayvanchuyen = time();
            if (isset($request["manglencho"]) && $request["manglencho"] == 1) {
                $havest->hinhthucvanchuyen = 1;
            } else {
                $havest->hinhthucvanchuyen = 2;
                $havest->daichivanchuyen = $request["diadiemnhan"];
            }
            $havest->status = 0;
            if ($havest->save()) {
                \Yii::$app->getSession()->setFlash('success', 'Bạn đã đăng ký dịch vụ thành công !');
            } else {

                \Yii::$app->getSession()->setFlash('error', 'Bạn đăng ký dịch vụ không thành công !');
            }
        }
        $userID = (int) Yii::$app->user->getId();

        $havests = Havest::find()->where(['Userid' => $userID])->all();

        return $this->renderAjax('thuhoach', ['havests' => $havests]);
    }

    public function actionFuprogress($fuid) {
        $fu_progress = FuProgress::find()->where(['fuid' => $fuid])->orderBy(['date' => 'ASC'])->all();
        //var_dump("<pre>");
        // var_dump($fu_progress);die();
        return $this->render('fuprogress', ['fuprogress' => $fu_progress]);
    }
    public function actionXoathuhoach($havestID){
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         if(Havest::find()->where(['havest_id'=>$havestID])->delete()){
              return [
                'massage' => 'ok roi day',
                'code' => 200,
            ];
             
         }else{
             return [
                'massage' => 'xoa khong thanh cong',
                'code' => 500,
            ];
             
         }
        
        
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = FALSE;
        return parent::beforeAction($action);
    }

}
